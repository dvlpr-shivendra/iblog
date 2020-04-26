<div class="modal" id="search-modal">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Modal title</p>
        <button class="delete" aria-label="close"
            onclick="document.querySelector('#search-modal').classList.remove('is-active')">
        </button>
      </header>
      <section class="modal-card-body">
        <nav class="panel">
            <div class="panel-block">
              <p class="control has-icons-left">
                <input class="input" type="text" placeholder="Find a post" id="search" autocomplete="off">
                <span class="icon is-left">
                  <i class="material-icons" aria-hidden="true">search</i>
                </span>
              </p>
            </div>
            <div id="search-results"></div>
          </nav>
      </section>
      <footer class="modal-card-foot"></footer>
    </div>
</div>