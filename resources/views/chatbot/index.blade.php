@extends('template')

@section('title', $title)

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
    <div class="msg left-msg">
      <div
       class="msg-img"
       style="background-image: url(http://localhost:8000/images/robot.svg)"
      ></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">Hemon Chatbot</div>
        </div>

        <div class="msg-text">
          Hi, welcome to Hemon Chatbot! Go ahead and send me a message. 😄
        </div>

        
      </div>

    </div>

    
    @foreach($chats as $chat)
      <div class="msg right-msg">
        <div class="msg-img" style="background-image: url(http://localhost:8000/images/person-fill.svg)"></div>

        <div class="msg-bubble">
          <div class="msg-info">
            <div class="msg-info-name">Anda</div>
          </div>

          <div class="msg-text">{{ $chat->message }}</div>
        </div>
      </div>

      <div class="msg left-msg">
        <div class="msg-img" style="background-image: url(http://localhost:8000/images/robot.svg)"></div>

        <div class="msg-bubble">
          <div class="msg-info">
            <div class="msg-info-name">Hemon Bot</div>
          </div>

          <div class="msg-text">{{ $chat->reply }}</div>
        </div>
      </div>

    @endforeach
    

  </main>

  <form method="post" action="/chatbot" class="msger-inputarea">
    @csrf
    <input type="text" class="msger-input" placeholder="Enter your message..." name="message">
    <button type="submit" class="msger-send-btn">Send</button>
  </form>
</section>

@endsection