<?php include_once 'admin_header.php' ?>
<div class="cont">
    <div class="tab_buttons">
            <ul class="tab_lists">
                <li id="tab1" class="active"><p>Managers</p></li>
                <li id="tab2"><p>Departments</p></li>
                <li id="tab3"><p>Projects</p></li>
            </ul>
        </div>
        
        <div class="tabs_content">
            <div class="active">
                <h2>Managers</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto optio itaque similique nulla veritatis voluptates tempora numquam, 
                    iure sint sit amet odit repellat, iste placeat dolores repellendus quae laboriosam. Odit et qui asperiores similique blanditiis debitis
                     maiores nobis necessitatibus est?</p>
            </div>
            <div>
                <h2>Departments</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde dolorum dolor voluptates 
                    facere quod esse, illum odio, nihil molestias fugiat debitis assumenda excepturi nulla veritatis corrupti, aut soluta doloremque officiis
                     beatae ipsam. Voluptatem in repellat ratione est, ut accusamus quibusdam?</p>
            </div>
            <div>
                <h2>Projects</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas adipisci, 
                    excepturi commodi eum, nam reprehenderit ipsam nemo 
                    aliquid praesentium esse doloribus quidem! Cumque, ut laborum.
                jhsdbjahvsjhvhgjavshc sjhbcjahvs kjahbscjhajhsjhbjhsvc lorem new ipsad germ frog desmn yrt ekrg</p>
            </div>
        </div>
</div>
        
    
    <script>
        let tabs = document.querySelectorAll('.tab_lists li');
        let tab_contents = document.querySelectorAll('.tabs_content div');

        // console.log(tabs, tab_contents)
        tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => {
                tabs.forEach((tab) => {
                    tab.classList.remove('active');
                });
                tab_contents.forEach((content) => {
                    content.classList.remove('active');
                });
                tabs[index].classList.add('active');
                tab_contents[index].classList.add('active');
            })
        })
    </script>
