# GRCeek High-Level Architecture

This document provides a high-level architecture overview for the GRCeek platform, including key business requirements and a modern technical architecture.

---

## Business Requirements (from Release Scope)

- User Management with RBAC and invitation flows
- Framework, Control, Risk, Policy, and Asset Management (CRUD, linking, status workflows)
- Workflow Management (customizable, drag-and-drop)
- Custom Reports and real-time dashboards
- System Configurations (categories, settings)
- Roles & Permissions (granular, per module)
- Incident Reporting (lifecycle, evidence upload)
- Page Builder (custom UI/pages)
- Notifications (template-based, role-based, email/in-app)
- Security (encryption, RBAC, audit logging)
- Performance (<4s response, 1,000 users)
- Usability (responsive UI, accessibility)
- Availability (95% uptime, DR)
- Maintainability (clean code, docs)

---

## High-Level Architecture Diagram

```mermaid
graph TD
    subgraph Frontend
        A["Web App: React"]
        B["Dashboards & Page Builder"]
    end

    subgraph Backend
        C["API: Python/Django or Node.js"]
        D["RBAC & Auth"]
        E["GRC Modules: User, Framework, Control, Risk, Policy, Asset, Incident"]
        F["Workflow Engine"]
        G["Notification Service"]
        H["Reporting Engine"]
        I["Audit Logging"]
        J["System Config"]

        subgraph Storage
            K[("Relational DB: PostgreSQL")]
            L[("Object Storage: min.io")]
        end

        subgraph Integrations
            M["Email Service"]
            N["SSO/External Auth"]
        end
    end

    A -- "REST/GraphQL" --> C
    B -- "REST/GraphQL" --> C
    C -- "DB ORM" --> K
    C -- "File Upload" --> L
    C -- "Email" --> M
    D -- "Auth" --> N
    G -- "Email" --> M
    F -- "Status/Workflow" --> E
    H -- "Data" --> K
    I -- "Logs" --> K
    J -- "Settings" --> K
```

---

*This architecture is designed for extensibility, modularity, and secure, scalable GRC operations aligned with business requirements.*
