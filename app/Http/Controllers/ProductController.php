<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function catalog(Request $request){
        $filter = $request->get('filter');
        $param = '';

        if(is_null($filter))
            $param = null;
        else if($filter === '1')
            $param = 'Напольные покрытия';
        else if($filter === '2')
            $param = 'Потолочные системы';
        else if($filter === '3')
            $param = 'Сайдинг и фурнитура';

        $requests = Product::select()->where('state', !is_null($param) ? '=' : '!=', $param ?? NULL)->SimplePaginate(8);

        return view('items.product.catalog', compact('requests'));
    }

    public function createproduct(){
        return view('admin.product.create');
    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|min:3|max:160',
            'title_description' => 'required|min:5',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'price' => 'required',
            'description'=> 'required',
        ],[
            'required' => 'Поле :attribute обязательно для заполнения',
            'min' => 'Недопустимая длина для поля :attribute',
            'max' => 'Недопустимая длина для поля :attribute',
            'mime' => 'Загружаемый имеет нежопустимый тип',
            'image' => 'Загружаемый файл не является изображением'
        ]);
        if($validation->fails())
            return back()->withErrors($validation)->withInput();

        $file = $request->file('photo');
        $fileInfo = $file->getClientOriginalName();
        $filename = pathinfo($fileInfo, PATHINFO_FILENAME);

        $extension = $file->getClientOriginalExtension();

        $store = $filename . '_' . time() . '.' . $extension;
        $file->storeAs('public/', $store);
        Product::create([
            'name' => $request->input('name'),
            'title_description' => $request->input('title_description'),
            'price' => $request->input('price'),
            'photo'=>$store,
            'description' => $request->input('description'),
            'state' => $request->input('state'),
        ]);

        return back()->with(['success' => true]);
    }
    public function OneProduct(Product $product)
    {
        $breadcrumbs = [
            ['routeName' => 'home', 'name' => 'Главная страница'],
            ['routeName' => 'catalog', 'name' => 'Все продукты'],
            ['name' => $product->name],
        ];
        return view('items.product.one', compact('product', 'breadcrumbs'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('catalog');
    }
//    public function index(){
//        return view('admin.create.index');
//    }
}
