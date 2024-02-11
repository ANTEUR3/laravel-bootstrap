@extends('layouts.app')
<style>
    #new_skill
    {
        display: none;
    }
    </style>

@section('content')

    <div class="container-fluid mb-4">
        <nav class="navbar  navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src={{ asset('assets/img/492923235fc80e2fde5d2ceb7e3c38f1-removebg-preview.png') }} alt=""
                        width="30" height="24" class="d-inline-block align-text-top">
                    InfoSchool
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"><i
                                    class="fa-solid fa-user"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">exams</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">history</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container-lg mb-4  " id="profile">
        <div class="row mb-4">
            <div class="col-lg-3 col-sm-12 col-md-4">
                <div class="card" style="">
                    <img src={{ asset('assets/img/avatar7.png') }} class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Profile</h5>
                        <div class="card border border-seconde mb-2 p-2">
                            i'm a computer sciences student in one of the algerian universities
                        </div>
                        <a href="#" class="btn btn-primary">Follow</a>
                        <a href="#" class="btn btn-warning">Update the bio</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12 col-md-8">
                <div class="card  mb-4  " style="">
                    <div class="card-body">
                        <h5 class="card-title text-dark">{{ $user->name }}</h5>
                        <p class="card-text "> email : {{ $user->email }}</p>
                        <p class="card-text ">university : {{ $user->university }}</p>
                        <p class="card-text ">level : {{ $user->level }}</p>

                    </div>
                </div>

                @if(isset($skills))
                @foreach ($skills->take(3) as $skill)
                    <div class="card mb-4" >
                        <div class="card-body">
                            <h5 class="card-title">{{$skill->title}}</h5>
                            <p class="card-text">{{$skill->description}}</p>
                            <a href="#" class="btn btn-warning">Update skill</a>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p>No skills found.</p>
                @endif
                <a href="#" class="btn btn-primary" onclick="newSkill()">new skill </a>
                <a href="#" class="btn btn-success">More </a>
            </div>

        </div>
        <div class="row justify-content-around">
            <div class="col-lg-5 col-sm-10 col-md-6">
                <div class="card " >
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{ asset('assets/img/hierarchy-structure.png') }}" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">algorithms exam</h5>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>

                          <p class="card-text"><small class="text-body-secondary">Take an exam and develop your skills</small></p>
                        <div  style="width: 100%">

                                <button class="btn btn-primary text-light" style="width: 50%">exam</button>

                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-lg-5 col-sm-10 col-md-6">
                <div class="card " >
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{ asset('assets/img/html-5.png') }}" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">algorithms exam</h5>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>

                          <p class="card-text"><small class="text-body-secondary">Take an exam and develop your skills</small></p>
                        <div  style="width: 100%">

                            <button class="btn btn-primary text-light" style="width: 50%">exam</button>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    <div class=" container  justify-content-center align-items-center  position-absolute   bg-light p-2" id="new_skill" style="top:10vw; width: 50vw;margin-left: 25vw;z-index: 2;border-width:1vw ">
        <div class="row " style="width: 70%">
            <div class="col-12 ">
                <form action="{{ route('newSkill') }}" method="POST" >
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
                    <button type="" class="btn btn-danger" onclick="cancelNewSkill()" ><div class="text-light">cancel</div></button>
                </form>
            </div>


        </div>


    </div>
    <script>
        function newSkill()
        {
            newSkillContainer=document.getElementById('new_skill');
            profile=document.getElementById('profile');
            newSkillContainer.style.display="flex";
            profile.style.opacity="10%";
        }

        function cancelNewSkill()
        {
            newSkillContainer=document.getElementById('new_skill');
            profile=document.getElementById('profile');
            newSkillContainer.style.display="none";
            profile.style.opacity="100%";
        }
    </script>





@endsection
