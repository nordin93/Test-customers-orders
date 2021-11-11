<div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Discription</label>
          <textarea  type="text" name="description" class="form-control" required></textarea>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <div class="form-group">
        <label>Cost</label>
        <input type="number" name="cost" class="form-control" required>
      </div>
    </div>
    <div class="col-6">
      <div class="form-group">
        <label>Customer</label>
        <select class="form-control" name="customer_id" id="customer_id" required>
          <option selected disabled>Choose a customer</option>
          @foreach ($customers as $customer)
          <option name="customer_id" value="{{$customer->id}}">{{$customer->first_name}} {{$customer->last_name}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-8">
      <div class="form-group">
        <label>Tag</label>
        <select class="form-control" name="tag_id[]" multiple="multiple" id="tag_id" required>
          <option selected disabled>you can choose more than one tag</option>
          @foreach ($tags as $tag)
          <option name="tag_id" value="{{$tag->id}}" @if (old("options")){{ (in_array($tag->id, old("options")) ? "selected":"") }}@endif
            >{{$tag->name}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>