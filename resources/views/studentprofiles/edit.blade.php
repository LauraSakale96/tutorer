@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  </head>

<div class="col-sm-9 col-md-9 col-lg-9 pull-left" style="background: white;">
<h1>Rediģē savu profilu</h1>

    
      <div class="row" style="background:white; margin: 10px;">

 
        <div class="col-lg-12 col-md-12 col-sm-12">
         <form method="post" action="{{ route('studentprofiles.update', [$studentprofile->id])}}">
            {{ csrf_field()}}
            <div class="form-group">
            <label for="student-name">Vārds<span class="required">*</span></label>
            <input placeholder="Ievadiet savu vārdu"
                    id="student-name"
                    required
                    name="name"
                    spellcheck="false"
                    class="form-control"
                    value="{{ $studentprofile->name }}"
                   
                    />
                    
            </div>

            <div class="form-group">
            <label for="student-lastname">Uzvārds<span class="required">*</span></label>
            <input placeholder="Ievadiet savu uzvārdu"
                    id="student-lastname"
                    required
                    name="lastname"
                    spellcheck="false"
                    class="form-control"
                    value="{{ $studentprofile->lastname }}"
                   
                    />
                    
            </div>

            <div class="form-group">
            <label for="student-age">Vecums<span class="required">*</span></label>
            <input placeholder="Ievadiet savu vecumu"
                    id="student-age"
                    required
                    name="age"
                    spellcheck="false"
                    class="form-control"
                    value="{{ $studentprofile->age }}"
                   
                    />
                    
            </div>
            <div class="form-group">
            <label for="student-school">Mācību iestāde</label>
            <input placeholder="Ievadiet mācību iestādi, kurā mācaties"
                    id="student-school"
                    required
                    name="school"
                    spellcheck="false"
                    class="form-control"
                    value="{{ $studentprofile->school }}"
                   
                    />
                    
            </div>

          
            <div class="form-group">
            <label for="student-content">Apraksts</label>
            <textarea 
                    style="resize: vertical"
                    id="student-content"
                    name="description"
                    rows="5" spellcheck="false"
                    class="form-control autosize-target text-left">
                    {{ $studentprofile->descriptionname }}
                    
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


    @endsection