  <div class="main-inner">
    <div class="container">
      <div class="row">




        <div class="span6">

          <!-- div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Jadwal</h3>
            </div>
            <div class="widget-content">
              <div id='calendar'>
              </div>
            </div>
          </div -->

          <!-- /widget -->
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> System Log</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content nano" id='about'>
				<div class="nano-content">
				  <ul class="news-items">
					<?php

					foreach($log as $value){
						//echo $value->waktu;
						$waktu = explode(" ",$value->waktu);
						$tgl = explode("/",$value->waktu);
						$thn = explode(" ",$tgl[2]);
						echo "<li><div class='news-item-date'> <span class='news-item-day'>".$tgl[0]."/".$tgl[1]."/".substr($thn[0],-2,2)."</span> <span class='news-item-month'>".$waktu[1]."</span> </div><div class='news-item-detail'> <a href='#' class='news-item-title' target='_blank'>".$value->topik."</a><p class='news-item-preview'>".$value->message."</p></div></li>";
					}

					?>
				  </ul>
				</div>
            </div>
            <!-- /widget-header 
            <div class="widget-content">
              <ul class="messages_layout">
                <li class="from_user left"> <a href="#" class="avatar"><img src="img/message_avatar1.png"/></a>
                  <div class="message_wrap"> <span class="arrow"></span>
                    <div class="info"> <a class="name">John Smith</a> <span class="time">1 hour ago</span>
                      <div class="options_arrow">
                        <div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-caret-down"></i> </a>
                          <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
                            <li><a href="#"><i class=" icon-share-alt icon-large"></i> Reply</a></li>
                            <li><a href="#"><i class=" icon-trash icon-large"></i> Delete</a></li>
                            <li><a href="#"><i class=" icon-share icon-large"></i> Share</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="text"> As an interesting side note, as a head without a body, I envy the dead. There's one way and only one way to determine if an animal is intelligent. Dissect its brain! Man, I'm sore all over. I feel like I just went ten rounds with mighty Thor. </div>
                  </div>
                </li>
                <li class="by_myself right"> <a href="#" class="avatar"><img src="img/message_avatar2.png"/></a>
                  <div class="message_wrap"> <span class="arrow"></span>
                    <div class="info"> <a class="name">Bender (myself) </a> <span class="time">4 hours ago</span>
                      <div class="options_arrow">
                        <div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-caret-down"></i> </a>
                          <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
                            <li><a href="#"><i class=" icon-share-alt icon-large"></i> Reply</a></li>
                            <li><a href="#"><i class=" icon-trash icon-large"></i> Delete</a></li>
                            <li><a href="#"><i class=" icon-share icon-large"></i> Share</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="text"> All I want is to be a monkey of moderate intelligence who wears a suit… that's why I'm transferring to business school! I had more, but you go ahead. Man, I'm sore all over. I feel like I just went ten rounds with mighty Thor. File not found. </div>
                  </div>
                </li>
                <li class="from_user left"> <a href="#" class="avatar"><img src="img/message_avatar1.png"/></a>
                  <div class="message_wrap"> <span class="arrow"></span>
                    <div class="info"> <a class="name">Celeste Holm </a> <span class="time">1 Day ago</span>
                      <div class="options_arrow">
                        <div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-caret-down"></i> </a>
                          <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
                            <li><a href="#"><i class=" icon-share-alt icon-large"></i> Reply</a></li>
                            <li><a href="#"><i class=" icon-trash icon-large"></i> Delete</a></li>
                            <li><a href="#"><i class=" icon-share icon-large"></i> Share</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="text"> And I'd do it again! And perhaps a third time! But that would be it. Are you crazy? I can't swallow that. And I'm his friend Jesus. No, I'm Santa Claus! And from now on you're all named Bender Jr. </div>
                  </div>
                </li>
                <li class="from_user left"> <a href="#" class="avatar"><img src="img/message_avatar2.png"/></a>
                  <div class="message_wrap"> <span class="arrow"></span>
                    <div class="info"> <a class="name">Mark Jobs </a> <span class="time">2 Days ago</span>
                      <div class="options_arrow">
                        <div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-caret-down"></i> </a>
                          <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
                            <li><a href="#"><i class=" icon-share-alt icon-large"></i> Reply</a></li>
                            <li><a href="#"><i class=" icon-trash icon-large"></i> Delete</a></li>
                            <li><a href="#"><i class=" icon-share icon-large"></i> Share</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="text"> That's the ONLY thing about being a slave. Now, now. Perfectly symmetrical violence never solved anything. Uh, is the puppy mechanical in any way? As an interesting side note, as a head without a body, I envy the dead. </div>
                  </div>
                </li>
              </ul>
            </div>-->
            <!-- /widget-content --> 
          </div>
          <!-- /widget --> 
        </div>
        <!-- /span6 -->
        <div class="span6">

          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Life Connections</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
				<ul class='news-items-lc' id='lifec'>

				</ul>
			</div>
          
          </div>

          <!-- /widget --> 
          <div class="widget widget-nopad">
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 

