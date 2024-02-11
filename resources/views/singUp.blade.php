@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- SECTION 1 -->
    <section
        style="border-radius:1.65vw;margin-top: 3vw;display: flex;flex-direction:row;justify-content:space-around;align-items:center;width:95vw;margin-left:2.5vw;height:90vh">
        <a href="/"><i class="fa-solid fa-x" style="position: absolute;top:1vw;left:1vw;"></i></a>
        <div class="image-holder " style="width: 38%;height:90%;margin-left:0.5%">
            <img src="assets/img/illustration1.png" alt="">
        </div>
        <div class="flex"
            style="display: flex;flex-direction:column;justify-content:center;align-items:center;height:99%;margin-top:0.5%;width:60%">
            <div class="btns"
                style="position: relative;;width: 50%;height: 5%;display:flex;flex-direction: row;align-items: center;justify-content: space-around">
                <div id="btn" style="position: absolute"></div>
                <button class="btn_ " id="b1" onclick="sing_up()">Sing up</button>
                <button class="btn_" id="b2" onclick="sing_in()">Sing in</button>
            </div>
            <form action="{{ url('/authentification') }}" method="POST" class="form-content" id="f1"
                style="height: 50%;display:none;flex-direction:column;justify-content:space-around">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input name="email" style="padding: 0" type="email" class="form-control" id="email"
                        placeholder="Enter your email address" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input name="password" style="padding: 0" type="password" class="form-control" id="password"
                        placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-danger">Register</button>
            </form>
            <form action="{{ url('/add_user') }}" method="POST" class="form-content " id="f2"
                style="height: 92%;display:flex;flex-direction:column;justify-content:space-around">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="fullName">Full Name:</label>
                    <input name="fullName" style="padding: 0" type="text" class="form-control" id="fullName"
                        placeholder="Enter your full name" required>
                    @if ($errors->get('fullName'))
                        @foreach ($errors->get('fullName') as $er)
                            <li class="text-danger">{{ $er }}</li>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input name="email" style="padding: 0" type="email" class="form-control" id="email"
                        placeholder="Enter your email address" required>
                    @if ($errors->get('email'))
                        @foreach ($errors->get('email') as $er)
                            <li class="text-danger">{{ $er }}</li>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input name="birthDate" style="padding: 0" type="date" class="form-control" id="dob" required>
                    @if ($errors->get('birthDate'))
                        @foreach ($errors->get('birthDate') as $er)
                            <li class="text-danger">{{ $er }}</li>
                        @endforeach
                    @endif
                </div>
                <div class="form-group" style="display: flex;flex-direction: column;">
                    <label for="university">select your university</label>
                    <select name="Entities"  class="form-control" id="entitiesSelect" >
                        <option disabled selected></option>
                        <option class="text-dark" for="university" value="west">west</option>
                        <option class="text-dark" for="university" value="east">east</option>
                        <option class="text-dark" for="university" value="center">center</option>

                    </select>
                    <div class="selects" style="display: flex;flex-direction: row;">
                        <select name="university"  class="form-control" id="westUniv" >
                            <option disabled selected>Select your university</option>
                            <option>Université de Béchar – Mohamed Tahri</option>
                            <option>Université de Mascara – Mustapha Stambouli</option>
                            <option>Université de Saida – Tahar Moulay</option>
                            <option>Université de Tlemcen – Abou Bekr Belkaid</option>
                            <option>Université d’Adrar – Ahmed Draya</option>
                            <option>Université de Tiaret – Ibn Khaldoun</option>
                            <option>Université Sidi Bel Abbès – Djillali Liabes</option>
                            <option>Université de Mostaganem – Abdelhamid Ibn Badis</option>
                            <option>Université d’Oran 1 – Ahmed Ben Bella</option>
                            <option>Université Mohamed Boudiaf des sciences et de la technologie – Mohamed Boudiaf d’Oran
                            </option>
                            <option>Université d’Oran 2 – Mohamed Ben Ahmed</option>
                            <option>Université de Chlef – Hassiba Benbouali</option>
                            <option>Université de Tissemsilt</option>
                            <option>Université de Aïn Témouchent</option>
                            <option>Université de Relizane</option>
                        </select>

                        </select>
                        <select name="university" class="form-control"id="eastUniv" >
                            <option disabled selected>Select your university</option>
                            <option>Université de Jijel – Mohammed Seddik Ben Yahia</option>
                            <option>Université de Tébessa – Larbi Tébessi</option>
                            <option>Université de Bordj Bou Arréridj – Mohamed Bachir El Ibrahimi</option>
                            <option>Université d’El Tarf – Chadli Bendjedid</option>
                            <option>Université de Khenchela – Abbas Laghrour</option>
                            <option>Université de Oum El Bouaghi – Larbi Ben M’hidi</option>
                            <option>Université d’El Oued – Hamma Lakhdar</option>
                            <option>Université de Souk Ahras – Mohammed-Chérif Messaadia</option>
                            <option>Université de Annaba – Badji Mokhtar</option>
                            <option>Université du 20 Août 1955 de Skikda</option>
                            <option>Université 8 Mai 1945 de Guelma</option>
                            <option>Université de Batna 1 – Hadj Lakhder</option>
                            <option>Université de Biskra – Mohamed Khider</option>
                            <option>Université de M’sila – Mohamed Boudiaf</option>
                            <option>Université de Ouargla – Kasdi Merbah</option>
                            <option>Université des sciences islamiques Emir Abdelkader de Constantine</option>
                            <option>Université de Sétif 1 – Ferhat Abbas</option>
                            <option>Université de Sétif 2 – Mohamed Lamine Debaghine</option>
                            <option>Université de Constantine 1 – Frères Mentouri</option>
                            <option>Université de Constantine 2 – Abdelhamid Mehri</option>
                            <option>Université de Constantine 3 - Salah Boubnider</option>
                            <option>Université de Batna 2 – Mustapha Ben Boulaid</option>
                        </select>

                        </select>
                        <select name="university" class="form-control" id="centerUniv" >
                            <option disabled selected>Select your university</option>
                            <option>Université de Bouira – Akli Mohand Oulhadj</option>
                            <option>Université de Djelfa – Ziane Achour</option>
                            <option>Université de Ghardaia</option>
                            <option>Université de Khemis Miliana – Djilali Bounaama</option>
                            <option>Université Médéa – Yahia Farès</option>
                            <option>Université des sciences et de la technologie d’Alger, Houari Boumediène</option>
                            <option>Université de Béjaia – Abderrahmane Mira</option>
                            <option>Université de Boumerdès – M’hamed Bougara</option>
                            <option>Université de Tizi Ouzou – Mouloud Maameri</option>
                            <option>Université de Laghouat – Amar Telidji</option>
                            <option>Université Blida 1 – Saad Dahlab</option>
                            <option>Université de Blida 2 – Lounici Ali</option>
                            <option>Université d’Alger 1 – Benyoucef Benkhedda</option>
                            <option>Université d’Alger 2 – Abou el Kacem Saâdallah</option>
                            <option>Université d’Alger 3 – Brahim Soltane Chaibout</option>
                            <option>Université de la Formation Continue</option>
                            <option>Université de Tamenghasset</option>
                        </select>

                    </div>

                    @if ($errors->get('university'))
                        @foreach ($errors->get('university') as $er)
                            <li class="text-danger">{{ $er }}</li>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="level">Level:</label>
                    <select name="level" class="form-control" id="level" required>
                        <option value="" disabled selected>Select your level</option>
                        <option value="licence 1">licence 1</option>
                        <option value="licence 2">licence 2</option>
                        <option value="licence 3">licence 3</option>
                        <option value="Master 1">Master 1</option>
                        <option value="Master 2">Master 2</option>
                        <option value="Master 2">autre</option>
                    </select>
                    @if ($errors->get('level'))
                        @foreach ($errors->get('level') as $er)
                            <li class="text-danger">{{ $er }}</li>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input name="password" style="padding: 0" type="password" class="form-control" id="password"
                        placeholder="Enter your password" required>
                    @if ($errors->get('password'))
                        @foreach ($errors->get('password') as $er)
                            <li class="text-danger">{{ $er }}</li>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input name="password_confirmation" style="padding: 0" type="password" class="form-control"
                        id="confirmPassword" placeholder="Confirm your password" required>
                    @if ($errors->get('password_confirmation'))
                        @foreach ($errors->get('password_confirmation') as $er)
                            <li class="text-danger">{{ $er }}</li>
                        @endforeach
                    @endif
                </div>
                <button type="submit" class="btn btn-danger">Register</button>

            </form>
        </div>
        <script>
            var sing_in_ = document.getElementById('b2');
            var sing_up_ = document.getElementById('b1');
            btn = document.getElementById('btn');
            form_1 = document.getElementById('f1');
            form_2 = document.getElementById('f2');

            function sing_up() {
                sing_up_.style.color = "white";
                sing_in_.style.color = "#d63152";
                btn.style.left = "0";
                form_1.style.display = "none";
                form_2.style.display = "flex";

            }

            function sing_in() {
                sing_up_.style.color = '#d63152';
                sing_in_.style.color = "white";
                btn.style.left = "50%";

                form_1.style.display = "flex";
                form_2.style.display = "none";
            }
            document.getElementById('entitiesSelect').addEventListener('change', function() {
        var selectedValue = this.value;
        console.log(selectedValue);
        const westUniv=document.getElementById('westUniv');

        const eastUniv=document.getElementById('eastUniv');
        const centerUniv=document.getElementById('centerUniv');

        console.log(westUniv.value);
        console.log(eastUniv.value);
        console.log(centerUniv.value);
        // Execute different functions based on the selected value
        if (selectedValue == 'west') {

          westUniv.style.display="flex";
          eastUniv.style.display="none";
            centerUniv.style.display="none";
        } else if (selectedValue === 'east') {
            eastUniv.style.display="flex";
            westUniv.style.display="none";
            centerUniv.style.display="none";

        } else if (selectedValue === 'center') {
            centerUniv.style.display="flex";
            westUniv.style.display="none";
          eastUniv.style.display="none";


        }
    });
    $(document).ready(function() {
    // Loop through each option and set the value to be the same as the content
    $('select option').each(function() {
      $(this).val($(this).text());
    });
  });




        </script>




    </section>
@endsection
