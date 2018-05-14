@extends('layouts.master')

@section('content')

<div class="col-sm-9 col-md-9 col-lg-9 pull-left" style="background: white;">
<hi>Pievieno jaunu priekšmetu!</h1>

      
      <!-- Example row of columns -->
      <div class="row" style="background:white; margin: 10px;">

 
        <div class="col-lg-12 col-md-12 col-sm-12">
         <form method="post" action="{{ route('subjects.store')}}">
            {{ csrf_field()}}

            
            <div class="form-group">
                <label for="subject-name">Nosaukums<span class="required">*</span></label>
                <input placeholder="Ievadiet mācību priekšmeta nosaukumu"
                        id="subject-name"
                        required
                        name="name"
                        spellcheck="false"
                        class="form-control"
                       
                        />
                        
                </div>

                <div class="form-group">
                <label for="subject-content">Apraksts<span class="required">*</span></label>
                <textarea placeholder="Ievadiet mācību priekšmeta aprakstu"
                        style="resize: vertical"
                        id="subject-content"
                        name="description"
                        rows="5" spellcheck="false"
                        class="form-control autosize-target text-left">
                        
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

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
         <!-- <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">-->
          <div class="sidebar-module">
            <h4>Izvēlieties, savu rīcību</h4>
            <ol class="list-unstyled">
              <li><a href="/subjects">Apskatīt visus savus mācību priekšmetus</a></li>
              
              
            </ol>
          </div>
          <!--<div class="sidebar-module">
            <h4>Memebers of the Party</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
              
            </ol>
          </div>-->
          
        </div>
    @endsection