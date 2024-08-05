<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <form wire:submit='send' method="POST">
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">User Name</label>
          <input type="text" class="form-control"  wire:model='name' id="exampleInputPassword1">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" wire:model='email' id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
            <textarea class="form-control"  wire:model='message' id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</div>
