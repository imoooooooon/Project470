# Team contribution workflow

`main` is the stable release branch; `staging` is shared integration/testing. Keep both permanent. Use normal merge commits, not squash or rebase merges. Never force-push or reset shared history to synchronize work.

| Member | GitHub | Working branch prefix |
|---|---|---|
| Md. Mahfuz Ahmed Emon | imoooooooon | `emon/` |
| Md. Abdullah Al Jarif | jarifff | `jarif/` |
| Mehrab Hossain Nizami | mugdhoo44 | `mehrab/` |
| Mir Mohammad Sajedul Islam | sajedulislam5840 | `sajedul/` |

Normally keep one active working branch per person, for one coherent feature, part of a feature, fix, or documentation task. Create branches for actual work, not four permanent personal branches. Examples below use Emon's prefix; substitute your own.

## First time

Follow README setup. Configure your **own** identity, using your GitHub-associated email or the exact private noreply address from GitHub Settings → Emails:

```sh
git config user.name "Your Name"
git config user.email "YOUR_VERIFIED_GITHUB_EMAIL"
```

Authenticate Git for Windows through Git Credential Manager's browser sign-in. Do not paste tokens into repository files. Each teammate uses their own GitHub account, database, and application keys.

## Start a new task

Begin with a clean working tree (commit current work before switching):

```sh
git fetch origin
git switch staging
git pull --ff-only origin staging
git switch -c emon/task-name
```

## Continue, commit, and push

```sh
git switch emon/task-name
git pull --ff-only
# Make a coherent change, then inspect it.
git status
git diff
git add path/to/changed-file
git diff --cached
git commit -m "Describe the actual contribution"
git push -u origin emon/task-name
```

For the first push, skip `git pull` if no upstream exists yet. Push current work at every sprint deadline, including incomplete work; use draft PRs and issue updates. Do not fabricate contributions or claim an unfinished feature is complete.

## Integrate staging and resolve conflicts

```sh
git fetch origin
git merge origin/staging
```

Pushing your branch does not overwrite staging. Plain `git pull` on your working branch usually updates that branch's upstream, **not staging**. Integrate staging explicitly as above. Git can merge independent changes automatically, but a successful text merge does not prove the combined application works.

For conflicts: run `git status`, discuss overlapping intent with the other author, edit the marked files preserving both intended changes, remove conflict markers, and inspect the diff. Do not blindly choose “ours” or “theirs.” Then:

```sh
git add path/to/resolved-file
php artisan test
php vendor/bin/pint --test
git commit
git push
```

If unsure, `git merge --abort` returns to the pre-merge state; ask the other author for help. Run tests again after the final resolution.

## PR, review, merge

Open a GitHub PR from your working branch into `staging` and fill in the template. Link the issue and SRS ID where relevant. Another teammate reviews the diff, tests, acceptance criteria, and AI disclosure. The author cannot approve their own PR. Resolve discussions and wait for `checks` and `release-source` to pass. Use **Create a merge commit**.

Optional GitHub CLI commands:

```sh
gh pr create --base staging --head emon/task-name
gh pr checkout PR_NUMBER
# Review the diff and run the checks before deciding.
gh pr review PR_NUMBER --approve
gh pr merge PR_NUMBER --merge
```

Only a different teammate may use the approval command. GitHub's web UI is equally suitable. A reviewer should update their local `.env`/database independently; never share credentials.

After merge, manually delete only the completed temporary branch:

```sh
git switch staging
git pull --ff-only origin staging
git branch -d emon/task-name
git push origin --delete emon/task-name
git fetch --prune
```

Automatic branch deletion should remain disabled so a staging-to-main merge cannot delete staging.

## Release the whole staging batch

Test the combined staging version. Open a PR from this repository's `staging` to `main` (CLI: `gh pr create --base main --head staging`). This includes **all** staging changes, not just one person's task. Another teammate reviews it; after CI and approval, use a normal merge commit. Keep staging after release. The `release-source` CI job rejects other source branches and forks targeting main.

## Tracking and course evidence

Use issues with a real owner, acceptance criteria, checks, and known limitations. Track Todo / In progress / In review / Done in an optional project board or issue status. Assign features only after team agreement; names in command examples are not feature allocations. Record at least five substantive features per member and 20 overall; authentication and individual CRUD operations do not count. Keep meaningful original commits, AI disclosure, demonstration evidence, and actual review outcomes.
