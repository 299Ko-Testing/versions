<?php

logg("Began of _afterChangeFiles", "INFO");

pluginsManager::getInstance()->installPlugin('users', true);

$mail = core::getInstance()->getConfigVal('adminEmail');
$pwd = core::getInstance()->getConfigVal('adminEmail');
$token = $_SESSION['adminToken'];

$users = [ 1 => [
    'email' => $mail,
	'token' => $token,
	'pwd' => $pwd]
];

logg("Create Admin User", "INFO");
util::writeJsonFile(DATA . 'users/users.json', $users);
$config = util::readJsonFile(DATA . 'config.json');
unset($config['adminEmail']);
unset($config['adminPwd']);
logg("Delete User in config", "INFO");
util::writeJsonFile(DATA . 'config.json', $config);

logg("Modif Blog comments", "INFO");
$newsManager = new newsManager();
$datas = util::scanDir(DATA . 'blog/comments');
foreach ($datas['file'] as $file) {
    $comments = util::readJsonFile($file);
    if (!empty($comments)) {
        foreach ($comments as $comm) {
            $idNews = $comm['idNews'];
            $item = $newsManager->create($idNews);
            $newsManager->loadComments($idNews);
            $comment = new newsComment();
            $comment->setIdNews($idNews);
            $comment->setAuthor($comm['author']);
            $comment->setAuthorEmail($comm['authorEmail']);
            $comment->setAuthorWebsite('');
            $comment->setDate($comm['date']);
            $comment->setContent($comm['content']);
            $newsManager->saveComment($comment);
        }
    }
    unlink($file);
}
rmdir(DATA . 'blog/comments');
logg("End of _afterChangeFiles", "INFO");
return true;