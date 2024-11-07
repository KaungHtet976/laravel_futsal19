 
 @props(['players'])
 <section class="container text-center" id="player">
    <h1 class="display-5 fw-bold mb-4">Player</h1>
   
    <form action="" class="my-3">
      <div class="input-group mb-3">
        <input
          type="text"
          autocomplete="false"
          class="form-control"
          placeholder="Search Blogs..."
        />
        <button
          class="input-group-text bg-primary text-light"
          id="basic-addon2"
          type="submit"
        >
          Search
        </button>
      </div>
    </form>
    <div class="row">
      @foreach ($players as $player)
      <div class="col-md-4 mb-4">
       
        <x-player-card :player="$player"/>
      </div>
          
      @endforeach
    </div>
  </section>