
<h1>{{ $meal['strMeal'] }}</h1>

<a href="/Category/{{  $meal['strCategory']  }}"> 
    {{ $meal['strCategory'] }} 
</a>


<p>{{ $meal['strInstructions'] }} </p>
<img style="width:300px" src={{ $meal['strMealThumb'] }}>

<h2> Ingredients </h2>

@if ($meal['ingredients'])
@foreach ($meal['ingredients'] as $ingredient => $measure)
    
<b> <p>{{  $measure  }} {{  $ingredient  }} </p></b>
@endforeach
@endif
    

@if ($meal['strYoutube'])
<br>
<h2>Video </h2>
<iframe width="560" height="315" src="{{ $meal['strYoutube'] }}" title="Receita" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

@endif
