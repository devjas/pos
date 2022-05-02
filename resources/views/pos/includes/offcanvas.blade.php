<div class="offcanvas offcanvas-start overflow-auto pos-bg-dark" data-bs-scroll="true" tabindex="-1" id="adminLeftCanvas" aria-labelledby="adminLeftCanvasLabel">
  <div class="offcanvas-header pos-bg-dark">
    <h5 class="offcanvas-title text-white" id="adminLeftCanvasLabel">System</h5>
    <button type="button" class="btn-close text-reset bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body ps-0 pe-0 pt-0">

  <div class="accordion accordion-flush" id="items">

    <div class="accordion-item">
      <h2 class="accordion-header" id="collapseItemLabel">
        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseItem" aria-expanded="false" aria-controls="collapseItem">
          ITEMS
        </button>
      </h2>
      <div id="collapseItem" class="accordion-collapse collapse" aria-labelledby="collapseItemLabel" data-bs-parent="#items">
        <div class="accordion-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item ps-0 pe-0"><a href="{{ route('category.index') }}" class="stretched-link">Categories</a></li>
            <!-- <li class="list-group-item ps-0 pe-0"><a href="#" class="stretched-link">Items</a></li>
            <li class="list-group-item ps-0 pe-0"><a href="#" class="stretched-link">Addons</a></li>
            <li class="list-group-item ps-0 pe-0"><a href="#" class="stretched-link">Extras</a></li>
            <li class="list-group-item ps-0 pe-0"><a href="#" class="stretched-link">Options</a></li> -->
          </ul>
        </div>
      </div>
    </div>
    
  </div>
    
  <div class="dropdown mt-3">
  </div>
  </div>
</div>