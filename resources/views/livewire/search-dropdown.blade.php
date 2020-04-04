<div class="relative">
            <input wire:model.debounce.500ms="search" type="text" class="bg-gray-800 text-sm rounded-full w-64 px-4 py-1 
            pl-8 focus:outline-none focus:shadow-outline" placeholder="Search Movies ">
            <div class="absolute top-0">
            <svg class="fill-current w-4 text-grey-500 mt-2 ml-2" viewBox="0 0 24 24">
               <path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 000 12z"/>
               
            </svg>
         </div>
         <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>
        @if (strlen($search)>=2)
             <div class="absolute bg-gray-800 rounded w-64 mt-4 text-sm"> 
             @if ($searchResults->count()>0)
                 <ul>
                 @foreach ($searchResults as $searchResult)
                      <li class="border-b border-grey-700">
                      <a href="{{route('movies.show',$searchResult['id'])}}" class="block flex items-center hover:bg-grey-700 px-3 py-3">
                        <img src="{{'https://image.tmdb.org/t/p/w500/'.$searchResult['poster_path']}}" alt="" class="w-8">
                        <span class="ml-4">{{$searchResult['title']}}</span>
                    </a>
                 </li>
                 @endforeach
                 
             </ul>
             @else
                <div class="px-3 py-3">No Result found for "{{$search}}" </div> 
             @endif
            

         </div>
        @endif
      </div>