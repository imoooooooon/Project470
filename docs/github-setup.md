# GitHub configuration and verification

Repository: https://github.com/imoooooooon/Project470

## Verified setup status (2026-11-12)

- `main` remains the default branch at the original baseline; `staging` was created from that baseline. Setup changes are pushed on `emon/setup-team-workflow`.
- [Setup PR #1](https://github.com/imoooooooon/Project470/pull/1) targets staging. Another teammate must review it before integration; no approval or merge is claimed.
- [CI run 43180069410](https://github.com/imoooooooon/Project470/actions/runs/43180069410) passed both **checks** and **release-source** for commit `3a49fc6`. The checks job includes Composer validation/install/platform checks, Pint, Laravel boot, MariaDB connectivity, and the existing tests. Later pushes must pass their own run.
- All four sprint milestones were created and their due dates read back as November 14, December 5, December 13, and December 20, 2026. Descriptions specify Asia/Dhaka and no invented cutoff time. The GitHub timestamp is only a date marker.
- Added `setup`, `feature`, and `blocked` labels; existing labels were preserved.
- GitHub API access now works. The connected account is imoooooooon, but the integration returns HTTP 403 **Resource not accessible by integration** for repository settings updates, branch-protection reads/writes, invitation reads, and project creation.
- **Neither main nor staging is currently protected.** Merge commits are enabled, but squash and rebase merging are also still enabled. Automatic branch deletion is disabled. Repository-owner action below is required before treating the workflow as enforced.
- Collaborator readback lists imoooooooon as admin and mugdhoo44/sajedulislam5840 with write access. The permission endpoint reports **jarifff: read**; the owner must confirm/arrange his write access or pending invitation. No invitations were sent and nobody was removed.
- Faculty access is reported by the user as already arranged; it was not independently verified because no faculty username was supplied. Optional project-board creation was denied by the integration and does not block setup.
- Visibility was not changed. The repository is public and existing raw course documents remain in its history.

## Required repository-owner actions

Keep **main** as default. Under Settings → General → Pull Requests, enable merge commits and disable squash merging, rebase merging, and automatic deletion of head branches. Delete only completed member/task branches manually.

The setup PR and its first passing CI run exist. Both exact job names **checks** and **release-source** can now be required. There are no path filters; both jobs run on every PR into staging/main and pushes to those branches. `release-source` accepts only this repository's staging branch for PRs into main.

Protect **both main and staging**:

- Require a pull request with at least one approval from another teammate; dismiss stale approvals after new commits.
- Require `checks` and `release-source`, with the branch up to date.
- Require resolution of review conversations.
- Enforce for administrators; disallow force pushes and deletion.
- Do not require linear history (normal merge commits are intentional).

Use branch protection or equivalent rulesets supported by the repository's GitHub plan. Verify the saved rules on both branches. Do not bypass rules or self-approve. A teammate reviews/merges the setup PR into staging, then reviews the whole staging-to-main release. Protect staging from deletion after releases.

Verify Jarif's write access in Settings → Collaborators, checking pending invitations before issuing a duplicate. The optional Todo / In progress / In review / Done project board can be created by the owner if desired. Do not assign semester features or mark them complete during setup.

## Review evidence

After applying settings, read back the rules on both branches and verify current CI before merging. The owner should enable only merge commits, disable squash/rebase merging, retain main as default, and keep automatic branch deletion disabled. A different teammate must approve PR #1. After merging into staging, test the combined batch and open a separate staging-to-main release PR. Do not bypass review or push setup directly into main.
