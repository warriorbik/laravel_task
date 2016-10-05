@extends('layouts.default')
@section('content')
<div class="lists">
    <table class="display" id="clients" width="100%" cellspacing="0">
       <?php
       if(isset($reader))
       {
            $cnt = 0;
           while (($lines = $reader->readLine()) !== false) {
       ?>
            
                @if($cnt==0)
                    <thead><tr>
                    <th>S.N</th>
                @elseif($cnt==1)
                    <tbody>
                    <tr>
                    <td>{{$cnt}}</td>
                @else
                    <tr>
                    <td>{{$cnt}}</td>
                @endif
               
                @foreach($lines as $line)
                    <?php
                    if($cnt==0)
                        echo"<th>".$line."</th>";
                    else
                        echo "<td>".$line."</td>";
                    ?>
                @endforeach
                @if($cnt==0)
                   </tr></thead>
                @else
                    </tr>
                @endif
            
       <?php
            $cnt++;
            }
            
       }
       ?>
       </tbody>
    </table>
</div>
<script>
$(function(){
    $('#clients').DataTable();
})
</script>
@stop
