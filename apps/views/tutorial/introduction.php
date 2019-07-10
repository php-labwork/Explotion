<div class="wrapper">
    <div class="row">
        <div class="w3-col m9">
            <div class="w3-border">
                <div class="w3-xlarge w3-padding w3-light-grey w3-border-bottom">Introduction</div>
                <div class="w3-padding">
                    <!-- Introduction Explotion -->
                    <div class="w3-xlarge">What is Explotion?</div>
                    <p>
                        Explotion is the simple MVC Framework for creating Dinamic Web Pages.
                        in this framework, you can do this:
                        <ul>
                            <li>Routing System</li>
                            <li>Controllers</li>
                            <li>Models</li>
                            <li>Views</li>
                            <li>Assets</li>
                            <li>Request</li>
                        </ul>
                        And we have some example for you in:
                        <ul>
                            <li>Templates & Demo</li>
                        </ul>
                        And then finally you can download this framework on:
                        <ul>
                            <li>Downloads</li>
                        </ul>
                    </p>

                    <!-- Instalation Explotion -->
                    <div class="w3-xlarge">Instalation</div>
                    <p>
                        To install Explotion, you have to do this:
                        <ul>
                            <li>Apache Server 2.4.xx VC 11 or more than it</li>
                            <li>PHP 5.5.xx or more than it</li>
                        </ul>
                        After you download explotion, now you must extract it to your htdocs folder.
                        and now open your project in texteditor.
                        This is our directory list.
                        <div style="display: block">
                            <img src="<?= $this->asset('images/01_struktur_directory.PNG') ?>" alt="">
                        </div>
                    </p>
                </div>
            </div>
        </div>
        <div class="w3-col m3">
            <?php $this->view("template/sidebar") ?>
        </div>
    </div>
</div>