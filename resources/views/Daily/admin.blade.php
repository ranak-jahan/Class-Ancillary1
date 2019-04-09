
@extends('layouts.app')

@section('content')

<div class="container">
    
    <div id="menubar">
        <ul id="menu">
           <table>         <tr>     

            <td class="current"> <a href="{{route('daily')}}" class="btn btn-success">Daily Routine
                </a> </td>


            <td> <a href="{{route('admin.dashboard')}}" class="btn btn-success">Semester Routine
                </a> </td>



               <td> <a href="{{route('file')}}" class="btn btn-success">Upload Files</a></td>
          


               <td> <a href="{{route('question')}}" class="btn btn-success">Upload Questions</a></td>
                <td> <a href="{{route('course')}}" class="btn btn-success">Course</a></td>
           </tr>
        </table>
              </ul>
              
 

          </div>




</div>






<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="background-color: #d6d6c2">
                  <div class="card-header" style="background-color:   #ccccb3">Logged as admin!


                </div>
                

               <div class="card-body" style="background-color:#ebebe0;">
                    <div class="row">
        <div class="col-lg-12 margin-tb" style="margin-top: 20px;">
            <div class="pull-left">
                <h2>Class Ancillary</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('daily.create')}}" class="btn btn-dark"> Add new class schedule</a>
                <a href="{{route('daily.truncate')}}" class="btn btn-dark"> Remove All</a>

            </div>
        </div>
    </div>
   <!--  @if($message=Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif -->
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
         <th>id</th>
        <th>Routine</th>
        <th>class</th>
        <th>Status</th>
        
                <th width="280px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dailymodels as $daily)

                <tr>
                    <td>{{$daily->id}}</td>
                    <td>{{$daily->Routine}}</td>
                    <td>{{$daily->class}}</td>
                    <td>{{$daily->Status}}</td>
                    
                    <td>
                         <form action="{{route('daily.destroy',['id'=>$daily->id])}}" method="post" role="form" class="delete_form">
                            
                            <a href="{{route('daily.edit',['id'=>$daily->id])}}" class="btn btn-primary">Update</a>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>


                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>




    </div>
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function()
{

    $('.delete_form').on('submit',function()
    {
        if(confirm("Sure to delete?"))
        {

            return true;
        }
        else
        {
            return false;
        }
    });
}); 

</script>

@endsection
