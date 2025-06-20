<h1> {{ $category }} </h1>
@foreach ($meals['meals'] as $meal )
<a href="/Meal/{{ $meal['idMeal'] }}"> 
    <h3>{{  $meal['strMeal']  }}</h3>
    <img style="width:200px" src={{ $meal['strMealThumb'] }}>
</a>
@endforeach