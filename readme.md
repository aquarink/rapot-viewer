# Rapot Viewer

Ide dasarnya adalah meminimalisir rapot yang hilang karena ditinggal dirumah siswa dan lupa mengembalikan.


## Guidelines

Before we look into how, here are the guidelines. If your Pull Requests fail
to pass these guidelines it will be declined and you will need to re-submit
when you’ve made the changes. This might sound a bit tough, but it is required
for us to maintain quality of the code-base.

### Documentation

If you change anything that requires a change to documentation then you will need to add it. New classes, methods, parameters, changing default values, etc are all things that will require a change to documentation. The change-log must also be updated for every change. Also PHPDoc blocks must be maintained.

### Compatibility

Recommends PHP 5.4 or newer to be used, but it should be compatible with PHP 5.2.4 so all code supplied must stick to this requirement. If PHP 5.3 (and above) functions or features are used then there must be a fallback for PHP 5.2.4.

### Branching


## How-to Guide

1. [Set up Git](https://help.github.com/en/articles/set-up-git) (Windows, Mac & Linux)
2. Go to the [CodeIgniter repo](https://github.com/bcit-ci/CodeIgniter)
3. [Fork it](https://help.github.com/en/articles/fork-a-repo)
4. [Clone](https://help.github.com/en/articles/fetching-a-remote#clone) your forked CodeIgniter repo: git@github.com:<your-name>/CodeIgniter.git.
5. Checkout the "develop" branch. At this point you are ready to start making changes.
6. Fix existing bugs on the Issue tracker after taking a look to see nobody else is working on them.
7. [Commit](https://help.github.com/en/articles/adding-a-file-to-a-repository-using-the-command-line) the files
8. [Push](https://help.github.com/en/articles/pushing-to-a-remote) your develop branch to your fork
9. [Send a pull request](https://help.github.com/en/articles/creating-a-pull-request)