# GitHub configuration and verification

Repository: https://github.com/imoooooooon/Project470

## Current setup status (2026-11-12)

- `staging` was created from the existing `main` baseline without changing main's history.
- Setup work belongs on `emon/setup-team-workflow`, for a teammate-reviewed PR into staging.
- Local MariaDB checks, existing tests, formatting, and Composer validation passed. GitHub Actions has not yet been observed running for this change.
- GitHub's API is blocked by the cloud network policy (`api.github.com`). Repository settings, branch protections, collaborator access, milestones, labels, PR creation, and project-board access could not yet be read or changed. Do not assume protections are active.
- The user says the four students and faculty already have access. No invitations were sent or users removed.
- Repository visibility was not changed. Raw course documents already exist in tracked history; review privacy separately before making any private repository public.

## Apply when GitHub API/settings access is available

Keep **main** as default. Under Settings → General → Pull Requests, enable merge commits and disable squash merging, rebase merging, and automatic deletion of head branches. Delete only completed member/task branches manually.

Open the setup PR into staging and let Actions run. Verify both exact job names **checks** and **release-source** exist and pass before requiring them. There are no path filters; both jobs run on every PR into staging/main and pushes to those branches. `release-source` accepts only this repository's staging branch for PRs into main.

Protect **both main and staging**:

- Require a pull request with at least one approval from another teammate; dismiss stale approvals after new commits.
- Require `checks` and `release-source`, with the branch up to date.
- Require resolution of review conversations.
- Enforce for administrators; disallow force pushes and deletion.
- Do not require linear history (normal merge commits are intentional).

Use branch protection or equivalent rulesets supported by the repository's GitHub plan. Verify the saved rules on both branches. Do not bypass rules or self-approve. A teammate reviews/merges the setup PR into staging, then reviews the whole staging-to-main release. Protect staging from deletion after releases.

Create milestones titled Sprint 1, Sprint 2, Sprint 3, Sprint 4 with due dates **2026-11-14**, **2026-12-05**, **2026-12-13**, **2026-12-20**. Descriptions must say dates are in Asia/Dhaka and no submission cutoff time has been specified. GitHub's timestamp storage is only a date marker, not an invented cutoff.

Useful labels: `setup`, `documentation`, `bug`, `feature`, `blocked`. Preserve existing labels/collaborators. Optionally create a Project with Todo / In progress / In review / Done; lack of Projects permission does not block branches/CI. Do not assign semester features or mark them complete.

Verify write access for imoooooooon, jarifff, mugdhoo44, and sajedulislam5840 without removing anyone. Faculty access is reported as already arranged; do not guess a username or send an invitation.

## Review evidence

After applying settings, record actual PR/run links, remote branch heads, protection readback, milestone dates, and collaborator verification here. Local command success alone is not evidence that CI or GitHub protections have been enabled.
