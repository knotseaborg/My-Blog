@extends('main')

@section('title', '| Contact')

@section('content')
      <div class="row">
        <div class="col-md-12">
          <h1>Contact Me</h1>
          <form>
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="subject">Subject</label>
              <input type="subject" class="form-control" id="subject" name="subject" placeholder="Subject">
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" id="message" name="message"></textarea>
              <p class="help-block">Example block-level help text here.</p>
            </div>
            <button type="submit" class="btn btn-success">Send Message</button>
          </form>
        </div><!-- /.jumbotron -->
      </div><!-- /.row -->
@endsection
