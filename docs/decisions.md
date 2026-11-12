# Working decisions — 2026-11-12
- User confirmed a shared implementation for four students and four sprints.
- Draft Google SRS snapshot preserved; source: https://docs.google.com/document/d/1ARiwnALjULP8wqzPuxKox6Rgsx6annNi9ogddrjKtDA/edit
- Laravel 13 and PHP 8.5 installed for local development. Hosting runtime compatibility remains to be checked.
- MariaDB remains the intended shared/deployment database. SQLite is temporary for local foundation verification because MariaDB is not installed. Do not claim MariaDB verification.
- Public roles: farmer, buyer, worker, seller. Agent, price contributor, veterinarian and administrator assignment requires a later trusted workflow; no public self-assignment.
- Foundation uses email/password. Phone login and password reset are not implemented yet.
- Current Bangla interface is a starting layout, not completed F24. Validation messages remain English.
- Payment provider, partial-payment/refund behavior, supported voice commands, and final scope remain provisional.

## Superseding environment/workflow decisions — 2026-11-12
- MariaDB 11.4 is now the local and CI target, with isolated development/test databases. SQLite is no longer the documented setup default.
- PHP 8.4.27 and locked Laravel 13.42.0 were verified in the cloud; local Windows setup uses stable PHP 8.4.
- Existing product code and Bootstrap assets are preserved. New UI choices, architecture, routes, and assessed features are deferred.
- Permanent main/staging branches, temporary member/task branches, teammate PR review, and merge commits are the agreed workflow.
- Correct sprint dates and unassigned ownership are in project-context.md and milestones.md. These supersede older tentative dates/allocations.
