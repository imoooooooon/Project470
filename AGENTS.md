# Krishi Bondhu
Laravel MVC, Blade, Bootstrap, JavaScript. Production database target: MariaDB.
Read docs/requirements/srs-draft-2026-11-12.txt and docs/decisions.md before changing requirements. SRS is a draft; preserve source documents.
Use controllers, form validation, Eloquent relationships and server-side policies. Never trust client role or owner IDs. Public registration must not grant privileged roles.
Run `php artisan test` and `php vendor/bin/pint --test`. Never commit .env, credentials, vendor, node_modules, or local databases.
Sprint features are complete only when all SRS behavior and relevant tests pass. Update docs/milestones.md and docs/ai-usage.md honestly. Do not claim human review or student understanding.

## Course constraints confirmed by user
- MERN projects are prohibited. Keep Laravel as the backend framework; Django and Flask are prohibited.
- The whole project must follow MVC. A frontend framework is optional; retain Blade and Bootstrap.
- FastAPI is allowed only for an AI system, but the current project uses Laravel directly for AI service calls.
- Libraries/packages may assist development but must not implement a major project feature. Evaluate dependencies before adding them; implement domain features in this repository.
- Each of four students must demonstrate at least five features, excluding login and signup. A team total of 20 alone does not establish compliance: track individual ownership and demonstration evidence.
- Idea, requirements and feature list must be submitted before Sprint 1 begins. Submission status is unverified; never claim submission or backdate records.
