<form method="POST" action="{{route('register.store')}}" >

    <div class="row">
        <div class="col-sm-12 mb-2">
            <label style="float:left;" id="name" for="fullname" class="mb-2">Fullname</label>
            <div class="form-floating">
                <input type="text" name="fullname" required placeholder="Full name" id="fullname" class="form-control" autofocus="autofocus">
            </div>
            @error('fullname')
                {{$message}}
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 mb-2">
            <label for = "citizen_identification" id="cid" class="mb-2" for="citizen_identification">Citizen identification</label>
            <div class = "form-floating">
                <input type="text" name = "CCCD" class = "form-control" placeholder ="citizen identification " required id="citizen_identification" value="" autofocus = "autofocus" autocomplete="off" >
            </div>
            @error('CCCD')
                {{$message}}
            @enderror
        </div>
    </div>
    <div class="row">

        <div class="col-sm-12 mb-2">
            <label style="float:left;" id="labeldate" for="date" class="mb-2">Date of birth</label>
            <div class="form-floating">
                <input type="date" id="date" value="" name="dateofbirth" required class="datebirth" autofocus="autofocus">
            </div>
            @error('dateofbirth')
                {{$message}}
            @enderror
        </div>

    </div>
    <div class="row">
        <div class="col-sm-12 mb-2">
            <label id="gmail" class="mb-2" for="email">Gmail</label>
            <div class="form-floating">
                <input type="email" class = 'form-control' id="email" required placeholder="Gmail" name="gmail" >
            </div>
            @error('gmail')
                {{$message}}
            @enderror
        </div>
    </div>

    @csrf
    <input type="submit" class="btn createaccount mb-2" value="Import account">
    @if (Session::has("result"))
        {{
            Session::get("result")
        }}
    @endif
</form>
