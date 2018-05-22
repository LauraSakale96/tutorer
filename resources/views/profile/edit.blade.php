@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  </head>

<div class="col-sm-9 col-md-9 col-lg-9 pull-left" style="background: white;">
<h1>Rediģē Savu Profilu</h1>

    
      <div class="row" style="background:white; margin: 10px;">

 
        <div class="col-lg-12 col-md-12 col-sm-12">
         <form method="post" action="{{ route('user.update', [$user->id])}}">
            {{ csrf_field()}}

            <input type="hidden" name="_method" value="put">
            <div class="form-group">
                <label for="user-name">Vārds<span class="required">*</span></label>
                <input placeholder="Ievadi savu vārdu"
                        id="user-name"
                        required
                        name="name"
                        spellcheck="false"
                        class="form-control"
                        value="{{ $user->name }}"/>
                        
                </div>

                <input type="hidden" name="_method" value="put">
            <div class="form-group">
                <label for="user-lastname">Uzvārds<span class="required">*</span></label>
                <input placeholder="Ievadi savu uzvārdu"
                        id="user-lastname"
                        required
                        name="lastname"
                        spellcheck="false"
                        class="form-control"
                        value="{{ $user->lastname }}"/>
                        
                </div>

                <input type="hidden" name="_method" value="put">
            <div class="form-group">
                <label for="user-subject">Uzvārds<span class="required">*</span></label>
                <input placeholder="Ievadi priekšmetu/-us, ko pasniedz"
                        id="user-subject"
                        required
                        name="subject"
                        spellcheck="false"
                        class="form-control"
                        value="{{ $user->subject }}"/>
                        
                </div>

                <input type="hidden" name="_method" value="put">
            <div class="form-group">
                <label for="user-education">Uzvārds<span class="required">*</span></label>
                <input placeholder="Ievadi savu iegūto izglītību"
                        id="user-education"
                        required
                        name="education"
                        spellcheck="false"
                        class="form-control"
                        value="{{ $user->education }}"/>
                        
                </div>

                <div class="form-group">
                <label for="user-codescription">Apraksts<span class="required">*</span></label>
                <textarea 
                        style="resize: vertical"
                        id="user-content"
                        required
                        name="description"
                        rows="5" spellcheck="false"
                        class="form-control autosize-target text-left">
                        {{$user->description}}
                        </textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary"
                        value="Pievienot"/>
                        </div>
                        </form>
       </div>
      
      </div>
</div>

         
          
        </div>
    @endsection