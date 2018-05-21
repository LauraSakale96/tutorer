@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>
<div class="col-sm-9 col-md-9 col-lg-9 pull-left" style=""background: white;>
<h1>Izveido savu profilu!</h1>

      
      <!-- Example row of columns -->
      <div class="row" style="background:white; margin: 10px;">

 
        <div class="col-lg-12 col-md-12 col-sm-12">
         <form method="post" action="{{ route('teacherprofiles.store')}}">
            {{ csrf_field()}}

    <div class="form-group">
                       
                <label for="teacher-image">Profila bilde</label>
                <input type="file" 
                        id="teacher-image"
                        name="image"
                        />
                        </div>
    
            <div class="form-group">
                <label for="teacher-name">Vārds<span class="required">*</span></label>
                <input placeholder="Ievadiet savu vārdu"
                        id="teacher-name"
                        required
                        name="name"
                        spellcheck="false"
                        class="form-control"
                       
                        />
                        
                </div>

                <div class="form-group">
                <label for="teacher-lastname">Uzvārds<span class="required">*</span></label>
                <input placeholder="Ievadiet savu uzvārdu"
                        id="teacher-lastname"
                        required
                        name="lastname"
                        spellcheck="false"
                        class="form-control"
                       
                        />
                        
                </div>

                <div class="form-group">
                <label for="teacher-subject">Priekšmets/-i, kurus pasniedzat<span class="required">*</span></label>
                <input placeholder="Ievadiet savu priekšmetu/-us"
                        id="teacher-subject"
                        required
                        name="subject"
                        spellcheck="false"
                        class="form-control"
                       
                        />
                        
                </div>
                <div class="form-group">
                <label for="teacher-education">Izglītība</label>
                <input placeholder="Ievadiet savu iegūto izglītību"
                        id="teacher-education"
                        required
                        name="education"
                        spellcheck="false"
                        class="form-control"
                       
                        />
                        
                </div>

              
                <div class="form-group">
                <label for="teacher-content">Apraksts</label>
                <textarea 
                        style="resize: vertical"
                        id="student-content"
                        name="description"
                        rows="5" spellcheck="false"
                        class="form-control autosize-target text-left">
                        
                        </textarea>
                </div>
              
                
                <div class="form-group">
                    <input type="submit" class="btn btn-primary"
                        value="Ievadīt"/>
                        </div>
                        </form>
       </div>
      
      </div>
</div>

    @endsection