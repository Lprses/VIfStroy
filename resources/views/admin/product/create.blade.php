@extends('main')
@section('content')
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                    <h1>Создание нового товара</h1>
                    @if(session()->has('success'))
                        <div class="alert alert-success">Товар успешно создан!</div>
                    @endif
                <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Наименование товара:</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Наименование товара" aria-describedby="invalidInputName" value="{{ old('name') }}">
                        @error('name') <div id="invalidInputName" class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputTitle" class="form-label">Краткое описание товара:</label>
                        <input type="text" name="title_description" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Краткое описание товара" aria-describedby="invalidInputName" value="{{ old('name') }}">
                        @error('name') <div id="invalidInputTitle" class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="state" class="form-label">Выберите категорию товара</label>
                        <select name="state" id="state">
                            <option value="Напольные покрытия">Напольные покрытия</option>
                            <option value="Потолочные системы">Потолочные системы</option>
                            <option value="Сайдинг и фурнитура">Сайдинг и фурнитура</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputPrice" class="form-label">Стоимость товара:</label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="inputPrice" placeholder="Пример: 198.93" aria-describedby="invalidInputPrice" value="{{ old('price') }}">
                        @error('price') <div id="invalidInputPrice" class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputFile" class="form-label">Выберите изображения для товара:</label>
                        <input name="photo" class="form-control @error('photo_file') is-invalid @enderror" type="file" id="inputFile" aria-describedby="invalidInputFile">
                        @error('photo_file') <div id="invalidInputFile" class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputDescription" class="form-label">Описание товара</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="inputDescription" rows="3" aria-describedby="invalidInputDescription">{{ old('description') }}</textarea>
                        @error('description') <div id="invalidInputDescription" class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        @if(isset($product))
                            Отредактировать товар
                        @else
                            Создать новый товар
                        @endif
                    </button>
                </form>
            </div>
            <div class="col"></div>
        </div>
@endsection
