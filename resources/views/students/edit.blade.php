@extends('layouts.master')

@section('content')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>

<div class="col-sm-9 col-md-9 col-lg-9 pull-left" style="background: white;">
<h1>Rediģēt skolēnu</h1>

      
      <!-- Example row of columns -->
      <div class="row" style="background:white; margin: 10px;">

 
        <div class="col-lg-12 col-md-12 col-sm-12">
         <form method="post" action="{{ route('students.update', [$student->id])}}" files="true">
            {{ csrf_field()}}

            <input type="hidden" name="_method" value="put">
            <div class="form-group">
                <label for="student-name">Vārds<span class="required">*</span></label>
                <input placeholder="Ievadiet skolēna vārdu"
                        id="student-name"
                        required
                        name="name"
                        spellcheck="false"
                        class="form-control"
                        value="{{ $student->name }}"/>
                        
                </div>

                <div class="form-group">
                <label for="student-lastname">Uzvārds<span class="required">*</span></label>
                <input placeholder="Ievadiet skolēna uzvārdu"
                        id="student-lastname"
                        required
                        name="lastname"
                        spellcheck="false"
                        class="form-control"  
                        value="{{ $student->lastname }}"
                        />           
                </div>

                <div class="form-group">
                    <label for="student-gender">Dzimums<span class="required">*</span></label>

                            <div class="col-md-8 text-md-right float-right">
                                <select class="col-md-4-right form-control" name="gender">
                                    <option value="empty"> </option>
                                    <option value="female">Sieviete</option>
                                    <option value="male">Vīrietis</option>
                                    <option value="none">Nevēlos norādīt</option>

                                 </select>
                            </div>
                        </div>

                <div class="form-group">
                <label for="student-age">Vecums<span class="required">*</span></label>
                <select name="age">
                    <? for ($age=1; $age <= 99; $age++): ?>
                    <option value="<?=$age;?>"><?=$age;?></option>
                    <? endfor; ?>
                </select>

                @if( $subjects == null)
                <input
                class="form-control"
                 type="hidden"
                        
                        name="subject_id"
                        value="{{$subject_id}}"                     
                        />                      
                </div>
                @endif

                @if( $subjects != null)
                <div class="form-group">
                <label for="student-content">Izvēlies priekšmetu, kuram skolēns tiks pievienots</label>
                <select name="subject_id" class="form-control">
                  @foreach($subjects as $subject)
                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach
                </select>
                </div>
                @endif

              
                <div class="form-group">
                    <input type="submit" class="btn btn-primary"
                        value="Ievadīt"/>
                        </div>
                        </form>
       </div>
      
      </div>
</div>

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
        
          <div class="sidebar-module">
            <h4>Ivēlieties savu darbību</h4>
            <ol class="list-unstyled">
              <li><a href="/lessons">Skolēnu saraksts</a></li>
              
            </ol>
          </div>
          
          
        </div>
    @endsection