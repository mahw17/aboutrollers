<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

?>


        <div class="row">
          <div class="span12">
            <h2>Om Allt om vältar</h2>
          </div>
        </div>
        <div class="row">
          <div class="span6">

            <!-- start: Accordion -->
            <div class="accordion" id="accordion2">
              <div class="accordion-group">
                <div class="accordion-heading">
                  <a class="accordion-toggle active" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                      <i class="icon-minus"></i> Webbplatsen</a>
                </div>
                <div id="collapseOne" class="accordion-body collapse in">
                  <div class="accordion-inner">
                      Denna webbplats använder sig utav ramverket Anax.
                      Anax finns dokumenterat på <a href="https://github.com/mosbth/anax">GitHub</a> och används i flertalet
                      kurser inom BTH:s webbprogrammeringsutbildning <a href="https://dbwebb.se/">dbwebb</a>.
                      Mikael Roos (lärare på BTH) är den som ursprungligen har byggt Anax och ligger nu som öppen källkod.

                      Som designmall valde jag temat <a href="https://bootstrapmade.com/demo/Lumia/">Lumia</a> från <a href="https://bootstrapmade.com/">BootstrapMade</a>.
                      Temat tilltalade mig och hade de regioner/block som jag letade efter, så som ovanliggande navbar, en footer samt att sidan
                      inte var ihophängande utan bestod av fristående sidor.
                  </div>
                </div>
              </div>
              <div class="accordion-group">
                <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                      <i class="icon-plus"></i> Om mig</a>
                </div>
                <div id="collapseTwo" class="accordion-body collapse">
                  <div class="accordion-inner">
                      Här kommer lite kort information om mig, Marcus Holmersson. Jag föddes i slutet av 70-talet i ett litet samhälle strax utanför Kalmar.

                        Efter gymnasiestudier och militärtjänstgörning läste jag till civilingenjör i Maskinteknik och tog examen från Linköpings Universitet 2005.

                        Jag har de senaste 13 åren jobbat med produktionsteknik i alla dess former såsom projektledare,
                        beredningsarbete, tillverkningsanalyser etc. och märker i mitt arbete ett ökat behov av att kunna mer programmering,
                        dels för att bli en bättre beställare av denna typ av tjänster men även för att kunna göra en del mindre applikationer själv.
                        Det är av dessa anledningar jag har hoppat på utbildningen i Webbprogrammering!
                  </div>
                </div>
              </div>
              <div class="accordion-group">
                <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                      <i class="icon-plus"></i> GitHub</a>
                </div>
                <div id="collapseThree" class="accordion-body collapse">
                  <div class="accordion-inner">
                      Detta avslutande kursmoment i kursen Ramverk1 har ett eget repo <a href="https://github.com/mahw17/aboutrollers">länk</a>.
                  </div>
                </div>
              </div>
            </div>
            <!--end: Accordion -->

          </div>
          <div class="span6">
            <div class="centered">
              <img src="assets/lib/img/dummies/about-img1.png" alt="" />
            </div>
          </div>
    </div>
