# Krishi Bondhu — CSE470

One shared Laravel MVC application for four students. Use Laravel controllers, form validation, Eloquent relationships, and server-side policies. Never trust client role/owner IDs; public registration cannot grant privileged roles. No MERN, Django/Flask primary backend, separate frontend application, or microservices. FastAPI may only support an AI system if later approved; the current plan calls AI services from Laravel.

Read `docs/project-context.md`, `docs/decisions.md`, and the draft SRS before requirements changes. Preserve original source documents. Environment work is not permission to generate assessed features, product routes, UI/design systems, business schema, or APIs. Existing product code remains; new information architecture, UI dependencies, and frontend tooling are deferred.

MariaDB 11.4 LTS, InnoDB, utf8mb4; PHP 8.4; Composer installs from composer.lock. Local databases/keys belong to each developer. Tests use only a separate `*_test` database/user. Never commit .env, .env.testing, credentials, dumps, uploads, vendor, node_modules, or logs. Do not run destructive migrations on development/shared data.

Checks: `composer validate --strict`, `composer check-platform-reqs`, `php artisan about --only=environment`, `php scripts/check-database.php`, `php artisan test`, `php vendor/bin/pint --test`. No npm build is needed for current pages.

Use existing isolated cloud checkouts; do not create Git worktrees unless explicitly requested. In cloud, activate `/workspace/.cloud-setup/bin` when present; workspace-local PHP needs `php artisan serve --no-reload`. Native Windows installations do not need this override.

Follow CONTRIBUTING.md: main = stable, staging = integration. Use emon/<task>, jarif/<task>, mehrab/<task>, sajedul/<task> for actual work, normally one active branch each. Merge origin/staging explicitly before PRs into staging. Releases must come from the same repository's staging branch into main. Use merge commits, never routine force pushes, history resets, squash or rebase merges. Require another teammate's review; do not fabricate approvals or bypass protections. Keep main/staging, delete only completed working branches.

Course constraints: at least 20 substantive features overall and five per member; authentication and individual CRUD operations do not count independently. Supporting packages must not implement major assessed features without faculty approval. Maintain meaningful individual commits and push work, including incomplete work, at every sprint deadline. Faculty needs repository access. Disclose AI use; students must understand and defend their contributions. Tools must not claim human review, student understanding, submission, ownership, or completion without evidence. Update docs/ai-usage.md and milestone evidence honestly; do not assign the semester's features during setup.
