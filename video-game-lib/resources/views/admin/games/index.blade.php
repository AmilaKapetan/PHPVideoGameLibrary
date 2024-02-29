@extends('layouts.master')
@include('layouts.topbar')

<hr class="text-white mx-3 my-4">
<div class="container text-center text-white">
    <h1 class="text-white display-3">Edit Games and Categories</h1>
    <div>
        <a class="btn btn-dark text-white border-light col" href="{{ route('admin.showCategories') }}">Manage Categories</a>
        <a class="btn btn-dark text-white border-light col"  href="{{ route('admin.addGame') }}">Add New Game</a>
    </div>

    <br><br>
    @foreach ($games as $game)
        <div class="row mt-2 mb-2">
            <h2 class="col text-white">{{ $game->name }}</h2>
            <button class="col btn btn-dark text-white border-light" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-gameid="{{ $game->id }}">Edit</button>
            <form class="col" action="{{ route('admin.deleteGame', $game->id) }}" method="post">
                @csrf
                <button class="col btn btn-dark text-white border-light" type="submit">Delete</button>
            </form>
        </div>
        <hr class="text-white mx-3 my-4">
    @endforeach

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel">New message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
            alert("{{ session('success') }}");
            @endif
        });




        const editModal = document.getElementById('editModal')
        editModal.addEventListener('show.bs.modal', event => {
        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const game = button.getAttribute('data-bs-gameid')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        const modalTitle = editModal.querySelector('.modal-title')
        const modalBodyInput = editModal.querySelector('.modal-body input')

        modalTitle.textContent = `Edit {{ $game->name }}`
        modalBodyInput.value = game
        })

    </script>
</div>
