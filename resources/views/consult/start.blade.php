@extends('template')

@section('title', 'Chatbot')

@section('add_head_script')
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
@endsection

@section('content')

<section class="msger">
  <header class="msger-header">
    <div class="msger-header-title">
      <i class="fas fa-comment-alt"></i> Hemon Chatbot
    </div>
    <div class="msger-header-options">
      <span><i class="fas fa-cog"></i></span>
    </div>
  </header>

  <main class="msger-chat">
  

    @foreach($chats as $chat)
      @if($chat->sender_role == $me)
        <div class="msg right-msg">
          <div class="msg-img" style="background-image: url(http://localhost:8000/images/person-fill.svg)"></div>

          <div class="msg-bubble">
            <div class="msg-info">
              <div class="msg-info-name">Anda</div>
            </div>

            <div class="msg-text">{{ $chat->message }}</div>
          </div>
        </div>
      @else
        <div class="msg left-msg">
          <div class="msg-img" style="background-image: url(http://localhost:8000/images/person-fill.svg)"></div>

          <div class="msg-bubble">
            <div class="msg-info">
              @if($me == 'Doctor')
                <div class="msg-info-name">User</div>
              @else
                <div class="msg-info-name">Dokter</div>
              @endif
            </div>

            <div class="msg-text">{{ $chat->message }}</div>
          </div>
        </div>
      @endif

    @endforeach
    

  </main>

  <form method="post" action="/consult" class="msger-inputarea">
    @csrf
    <input type="hidden" name="sender_role" value="{{ $me }}">
    <input type="text" class="msger-input" placeholder="Enter your message..." name="message">
    <button type="submit" class="msger-send-btn">Send</button>
  </form>
</section>

@endsection