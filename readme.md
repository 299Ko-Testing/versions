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

- In file testing execUpdate :
    - Change $version to the testing version to create (x.x.x)
    - $commitLastVersion is the full SHA1 of the last version (eg 1.1.0)
    - $commitFutureVersion is the full SHA1 of last commit to test
- In a terminal, exec `php execUpdate.php` in versions folder.
- In versions-testing/core/versions.json, add the new version and modify last_version at top
- Commit versions repo
