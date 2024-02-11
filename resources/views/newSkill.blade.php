@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center align-items-center  border border-primary mt-10" style="height: 60vh">
    <div class="row " style="width: 70%">
        <div class="col-12 ">
            <form action="" >
                @csrf
                <b class="text-primary">add new skill</b>
                <div class=" form-group mb-3">
                    <label for="title">skill name :</label>
                    <input name="title" style="padding: 0" type="text" class="form-control border border-primary p-2" id="title"
                        placeholder="skill name" required>
                </div>
                <div class=" form-group mb-3">
                    <label for="description" class="form-label">description : </label>
                    <textarea class="form-control border border-primary p-2" id="description" name="description" rows="5" required></textarea>
                </div>
                <input type="submit" class="btn btn-warning">
                <button type="" class="btn btn-danger" ><div class="text-light">cancel</div></button>

            </form>
        </div>


    </div>


</div>


@endsection
