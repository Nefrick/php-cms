<?php Head('Главная страница') ?>
<body>
<div class="container">
  <?php Menu() ?>
</div>
<div class="container">

      <div class="starter-template">
        <h1>Git</h1>
        <p class="lead">git --version</p>
        <p class="lead">which git</p>
        <p class="lead">git config --global user.name  "Nefrick"</p>
        <p class="lead">git config --global user.email "e-mail"</p>
        <p class="lead">git config --list</p>
        <p class="lead">git config --global color.ui true</p>
        <p class="lead">curl -OL https://github.com/git/git/raw/master/git/contrib/completion/git-completion.bash</p>
        <p class="lead">mv ~/git-completion.bash ~/.git-completion.bash</p>
        <p class="lead">mv ~/git-completion.bash ~/.git-completion.bash</p>
        <p class="lead">nano .bash_profile</p>
        <p class="lead">if [ -f ~/.git-completion.bash ]; then
                        source ~/.git-completion.bash
                        fi</p>
        <p class="lead">git add .</p>
        <p class="lead">git commit -m "Initial commit"</p>
        <p class="lead">git log</p>
        <p class="lead">git log --since=2016-08-14</p>
        <p class="lead" id="anchor">git log --until=2016-08-14</p>
        <p class="lead">git log --author="Nefrick"</p>
        <p class="lead">git log --grep="Init"</p>
        <p class="lead">git status</p>
      </div>

</div>

<?php Footer() ?>

</body>
</html>
