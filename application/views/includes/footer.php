<footer class="main-footer">
    <div class="text-center status-bar">Status Bar</div>
</footer>
<style>
    .overlay-chat {
    display:none;
    width: 100%;
    height: 100%;
    position: fixed;
    left: 0;
    top: 0;
    opacity: 0.5;
    z-index: 100;
    background: black;
}
 .show-card {
    animation: fade_in_show 0.5s;
    display: block;
}

@keyframes fade_in_show {
    /* 0% {
        opacity: 0;
        transform: scale(0)
    }

    100% {
        opacity: 1;
        transform: scale(1)
    } */

    0% {
    background:rgba(0,0,0,.0);
  }
  100% {
    background:rgba(0,0,0,.7);
  }
}

.hide-card {
    display: none !important;
    animation: fade_in_hide 0.5s;
}

@keyframes fade_in_hide {
    /* 0% {
        opacity: 1;
        transform: scale(1)
    }

    100% {
        opacity: 0;
        transform: scale(0)
    } */

   
    0% {
    background:rgba(0,0,0,.7);
  }
  100% {
    background:rgba(0,0,0,.0);
  }
}

.times{
    position: absolute;
    top: 0px;
    right: 0;
}
.center {
  position: fixed;
  top: 50%;
  left: calc(50% + 12rem);
  transform: translate(-50%, -50%);
  z-index: 1000;
}

.pic {
  width: 4rem;
  height: 4rem;
  background-size: cover;
  background-position: center;
  border-radius: 50%;
}

.contact {
  position: relative;
  margin-bottom: 1rem;
  padding-left: 5rem;
  height: 4.5rem;
  display: flex;
  flex-direction: column;
  justify-content: center;
}
.contact .pic {
  position: absolute;
  left: 0;
}
.contact .name {
  font-weight: 500;
  margin-bottom: 0.125rem;
}
.contact .message, .contact .seen {
  font-size: 0.9rem;
  color: #999;
}
.contact .badge {
  box-sizing: border-box;
  position: absolute;
  width: 1.5rem;
  height: 1.5rem;
  text-align: center;
  font-size: 0.9rem;
  padding-top: 0.125rem;
  border-radius: 1rem;
  top: 0;
  left: 2.5rem;
  background: #333;
  color: white;
}

.contacts {
  position: absolute;
  top: 50%;
  left: 0;
  transform: translate(-6rem, -50%);
  width: 24rem;
  height: 32rem;
  padding: 1rem 2rem 1rem 1rem;
  box-sizing: border-box;
  border-radius: 1rem 0 0 1rem;
  cursor: pointer;
  background: white;
  box-shadow: 0 0 8rem 0 rgba(0, 0, 0, 0.1), 2rem 2rem 4rem -3rem rgba(0, 0, 0, 0.5);
  transition: transform 500ms;
}
.contacts h2 {
  margin: 0.5rem 0 1.5rem 5rem;
}
.contacts .fa-bars {
  position: absolute;
  left: 2.25rem;
  color: #999;
  transition: color 200ms;
}
.contacts .fa-bars:hover {
  color: #666;
}
.hover-contacts .contact:last-child {
  margin: 0;
}
.hover-contacts:hover {
  transform: translate(-23rem, -50%);
}

.chat {
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  width: 24rem;
  height: 38rem;
  z-index: 2;
  box-sizing: border-box;
  border-radius: 1rem;
  background: white;
  box-shadow: 0 0 8rem 0 rgba(0, 0, 0, 0.1), 0rem 2rem 4rem -3rem rgba(0, 0, 0, 0.5);
}
.chat .contact.bar {
  flex-basis: 3.5rem;
  flex-shrink: 0;
  margin: 1rem;
  box-sizing: border-box;
}
.chat .messages {
  padding: 1rem;
  background: #F7F7F7;
  flex-shrink: 2;
  overflow-y: auto;
  box-shadow: inset 0 2rem 2rem -2rem rgba(0, 0, 0, 0.05), inset 0 -2rem 2rem -2rem rgba(0, 0, 0, 0.05);
}
.chat .messages .time {
  font-size: 0.8rem;
  background: #EEE;
  padding: 0.25rem 1rem;
  border-radius: 2rem;
  color: #999;
  width: -webkit-fit-content;
  width: -moz-fit-content;
  width: fit-content;
  margin: 0 auto;
}
.chat .messages .message {
  box-sizing: border-box;
  padding: 0.5rem 1rem;
  margin: 1rem;
  background: #FFF;
  border-radius: 1.125rem 1.125rem 1.125rem 0;
  min-height: 2.25rem;
  width: -webkit-fit-content;
  width: -moz-fit-content;
  width: fit-content;
  max-width: 66%;
  box-shadow: 0 0 2rem rgba(0, 0, 0, 0.075), 0rem 1rem 1rem -1rem rgba(0, 0, 0, 0.1);
}
.chat .messages .message.parker {
  margin: 1rem 1rem 1rem auto;
  border-radius: 1.125rem 1.125rem 0 1.125rem;
  background: #333;
  color: white;
}
.chat .messages .message .typing {
  display: inline-block;
  width: 0.8rem;
  height: 0.8rem;
  margin-right: 0rem;
  box-sizing: border-box;
  background: #ccc;
  border-radius: 50%;
}
.chat .messages .message .typing.typing-1 {
  -webkit-animation: typing 3s infinite;
          animation: typing 3s infinite;
}
.chat .messages .message .typing.typing-2 {
  -webkit-animation: typing 3s 250ms infinite;
          animation: typing 3s 250ms infinite;
}
.chat .messages .message .typing.typing-3 {
  -webkit-animation: typing 3s 500ms infinite;
          animation: typing 3s 500ms infinite;
}
.chat .input {
  box-sizing: border-box;
  flex-basis: 4rem;
  flex-shrink: 0;
  display: flex;
  align-items: center;
  padding: 0 0.5rem 0 1.5rem;
}
.chat .input i {
  font-size: 1.5rem;
  margin-right: 1rem;
  color: #666;
  cursor: pointer;
  transition: color 200ms;
}
.chat .input i:hover {
  color: #333;
}
.chat .input input {
  border: none;
  background-image: none;
  background-color: white;
  padding: 0.5rem 1rem;
  margin-right: 1rem;
  border-radius: 1.125rem;
  flex-grow: 2;
  box-shadow: 0 0 1rem rgba(0, 0, 0, 0.1), 0rem 1rem 1rem -1rem rgba(0, 0, 0, 0.2);
  font-family: Red hat Display, sans-serif;
  font-weight: 400;
  letter-spacing: 0.025em;
}
.chat .input input:placeholder {
  color: #999;
}

@-webkit-keyframes typing {
  0%, 75%, 100% {
    transform: translate(0, 0.25rem) scale(0.9);
    opacity: 0.5;
  }
  25% {
    transform: translate(0, -0.25rem) scale(1);
    opacity: 1;
  }
}

@keyframes typing {
  0%, 75%, 100% {
    transform: translate(0, 0.25rem) scale(0.9);
    opacity: 0.5;
  }
  25% {
    transform: translate(0, -0.25rem) scale(1);
    opacity: 1;
  }
}
.pic.stark {
  background-image: url("https://vignette.wikia.nocookie.net/marvelcinematicuniverse/images/7/73/SMH_Mentor_6.png");
}

.pic.banner {
  background-image: url("https://vignette.wikia.nocookie.net/marvelcinematicuniverse/images/4/4f/BruceHulk-Endgame-TravelingCapInPast.jpg");
}

.pic.thor {
  background-image: url("https://vignette.wikia.nocookie.net/marvelcinematicuniverse/images/9/98/ThorFliesThroughTheAnus.jpg");
}

.pic.danvers {
  background-image: url("https://vignette.wikia.nocookie.net/marvelcinematicuniverse/images/0/05/HeyPeterParker.png");
}

.pic.rogers {
  background-image: url("https://vignette.wikia.nocookie.net/marvelcinematicuniverse/images/7/7c/Cap.America_%28We_Don%27t_Trade_Lives_Vision%29.png");
}

@media only screen and (max-width : 768px){
    .center {
        left: 60%;
        transform: translate(-50%, -50%);
    }

    .contacts {
        left: 10%;
        width: 15rem;
        height: auto;
    }

    .contact {
        margin-bottom: 2px;
    }

    .contact .pic{
        width: 40px;
        height: 40px;
        left: -7px;
    }

    .contact .badge {
        width: 1.2rem;
        height: 1.2rem;
        font-size: 0.5rem;
        padding-top: 0.43rem;
        top: 12px;
        left: 1.4rem;
    }

    .chat {
        width: 18rem;
        height: 31rem;
    }
    .chat .input {
        padding: 0 0.5rem 0 1.5rem;
    }

    .chat .input i {
        font-size: 1.3rem;
    }

    .chat .input input {
 
    font-size: 11.5px;
}

}


</style>
<div class="center hide-card">
  <div class="contacts hover-contacts">
    <!-- <i class="fa fa-bars fa-2x"></i>
    <h2>
      Contacts
    </h2> -->
    <div class="contact">
      <div class="pic rogers"></div>
      <div class="badge">
        14
      </div>
      <div class="name">
        Steve Rogers
      </div>
      <div class="message">
        That is America's ass 🇺🇸🍑
      </div>
    </div>
    <div class="contact">
      <div class="pic stark"></div>
      <div class="name">
        Tony Stark
      </div>
      <div class="message">
        Uh, he's from space, he came here to steal a necklace from a wizard.
      </div>
    </div>
    <div class="contact">
      <div class="pic banner"></div>
      <div class="badge">
        1
      </div>
      <div class="name">
        Bruce Banner
      </div>
      <div class="message">
        There's an Ant-Man *and* a Spider-Man?
      </div>
    </div>
    <div class="contact">
      <div class="pic thor"></div>
      <div class="name">
        Thor Odinson
      </div>
      <div class="badge">
        3
      </div>
      <div class="message">
        I like this one
      </div>
    </div>
    <div class="contact">
      <div class="pic danvers"></div>
      <div class="badge">
        2
      </div>
      <div class="name">
        Carol Danvers
      </div>
      <div class="message">
        Hey Peter Parker, you got something for me?
      </div>
    </div>
  </div>
  <div class="chat">
    <div class="contact bar">
      <div class="pic stark"></div>
      <div class="name">
        Tony Stark
      </div>
      <div class="seen">
        Today at 12:56
      </div>
      <div class="times"><i class="fa fa-times" aria-hidden="true"></i></div>
    </div>
    <div class="messages" id="chat">
      <div class="time">
        Today at 11:41
      </div>
      <div class="message parker">
        Hey, man! What's up, Mr Stark? 👋
      </div>
      <div class="message stark">
        Kid, where'd you come from? 
      </div>
      <div class="message parker">
        Field trip! 🤣
      </div>
      <div class="message parker">
        Uh, what is this guy's problem, Mr. Stark? 🤔
      </div>
      <div class="message stark">
        Uh, he's from space, he came here to steal a necklace from a wizard.
      </div>
      <div class="message stark">
        <div class="typing typing-1"></div>
        <div class="typing typing-2"></div>
        <div class="typing typing-3"></div>
      </div>
    </div>
    <div class="input">
      <i class="fa fa-camera"></i><i class="fa fa-laugh-beam"></i><input placeholder="Type your message here!" type="text" /><i class="fa fa-microphone"></i>
    </div>
  </div>
</div>

<script>
    var chat = document.getElementById('chat');
   chat.scrollTop = chat.scrollHeight - chat.clientHeight;


   $(()=>{
    if (window.matchMedia("(max-width: 767px)").matches) 
        {
            
           
            if($(".contacts").hasClass('hover-contacts')){
                $(".contacts").removeClass('hover-contacts');
            }
        } else {
            
            if(!$(".contacts").hasClass('hover-contacts')){
                $(".contacts").addClass('hover-contacts');
            }
        }
   });

   $(()=>{
    $(".status-bar").click(()=>{
        if($(".center").hasClass('hide-card')){
            $(".center").removeClass('hide-card');
            $(".center").addClass('show-card');
            $(".overlay-chat").show();
        }
        else if($(".center").hasClass('show-card')){
            $(".center").removeClass('show-card');
            $(".center").addClass('hide-card');
            $(".overlay-chat").hide();
        }
    });
   })

   $(document).on("click",".times",()=>{
    if($(".center").hasClass('show-card')){
            $(".center").removeClass('show-card');
            $(".center").addClass('hide-card');
            $(".overlay-chat").hide();
        }
   });
</script>

</html>