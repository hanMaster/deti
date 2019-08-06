@section('js-dt')

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
</script>

<script>
  $().ready(function(){
    $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    startDate: '-13Y'
    });
    
    const dt = {!! json_encode($calendar->date_event)!!};
    
    $('.datepicker').datepicker('update', dt);
  });
  
</script>
<script>
  
</script>

@endsection