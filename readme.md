## 299Ko Versions Testing

This repo is used to update automatically 299Ko from the testing branch, to get new versions before official releases.

---
# Don't use this with a site in production !!!
---

## How to get updates from this repo (testing releases)

- In file `common/plugin/configmanager/lib/UpdaterManager.php` change this line :

```
const REMOTE = 'https://raw.githubusercontent.com/299Ko/';
```

For :

```
const REMOTE = 'https://raw.githubusercontent.com/299Ko-Testing/';
```

- And that's all ! Enjoy :)

Be sure you're using this with a testing site, and not your production site ^^

## Create a new testing version

- Commit all modified files to 299Ko origin
- Copy files from 299Ko/299ko (branch you want) in 299Ko-Testing
- Change version in 299Ko-Testing/common/config.php (eg 1.3.0Beta1)
- Commit 299Ko-Testing repo with Vx.x.x
- Create a tag in Testing Git repo with vx.x.x tag name
- In file testing execUpdate :
    - Change $version to the testing version to create (x.x.x)
    - $commitLastVersion is the full SHA1 of the last version (eg 1.3.0Beta1) (in 299Ko origin repo)
    - $commitFutureVersion is the full SHA1 of last commit to test (in 299Ko origin repo)
- In a terminal, exec `php execUpdate.php` in versions folder.
- In versions-testing/core/versions.json, add the new version and modify last_version at top
- Add before & after run files
- Commit versions repo
