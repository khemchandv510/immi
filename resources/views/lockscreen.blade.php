<!doctype html>
<html>
    <head>
        <title>Immigration lock screen</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" ></script>
    </head>
    <style>
        body{
            background-color: #132c48;
        }
        
            .vertical-center {
               display: flex;
               align-items: center;
               min-height: 50vh;
            }



article h3 {
    padding: 10px;
    color: #fff;
}
article .count {
    padding: 5px;
}
article #timer{
    padding: 5px;
    color: crimson;
    background-color: aliceblue;
    border-radius: 2px;
    margin-top: 100px;
}

article#model3 {
    width: 230px;
    margin: auto;
    text-align: center;
}
    </style>
    
        
        <body class="">
    <div class="container-fluid">
        <article class="clock" id="model3">
             <p id='timer'></p>
            </article>
      <div class="row vertical-center" >
          <form class="col-xs-8 col-xs-offset-2  col-sm-6 col-sm-offset-3 col-md-4 col-sm-offset-4 col-lg-2 col-lg-offset-5" action="login" method="post" style="width: 370px; margin: auto;">
              @csrf
            <h1 style="color:#fff; text-align:center"> {{$data[0]->name}}</h1>
            
            <p>
              <label class="sr-only" for="">Password</label>
              <input class="form-control" type="hidden" name="email" value="{{$data[0]->email}}">
              <input class="form-control" type="password" name="password" placeholder="Password" required>
            </p>
            
            <button class="btn btn-primary btn-block" type="sumbit">Unlock screen</button>
          </form>
          
             
        
        
        
      </div>
    </div>
    
    
 
   <script>

		    const timerValue = 1800;
		    
		    let time = localStorage.getItem('saved_timer');
		    if(time == null) {
		        const saved_timer = new Date().getTime() + (timerValue * 1000);
		        localStorage.setItem('saved_timer', saved_timer);
		        time = saved_timer;
		    }
		    
		    const timerID = setInterval(() => {
		        const now = new Date().getTime();
		        const difference = time - now;
		        
		        
		        const totalSeconds = Math.floor(difference/1000);
		        const minutes = Math.floor(totalSeconds / 60);
		        const seconds = totalSeconds % 60;
		        document.querySelector("#timer").innerText = 'Time Left: ' + minutes + ':' + ((seconds < 10) ? '0' + seconds : seconds);
		        
		        if(totalSeconds <= 0) {
		            clearInterval(timerID);
		            localStorage.removeItem('saved_timer');
		        }
		    }, 1000);
		</script>
</html>

