# GRCeek Project Release Scope

As part of our progress on the GRCeek project, please find below the scope for both the first release and the next release:

## First Release Scope

- User Management
- Framework Management
- Control Management
- Risk Management
- Policy Management
- Asset Management

> 📌 We kindly request the designs for the first release scope to be finalized and delivered as soon as possible to proceed with development.

## Next Release Scope

- Workflow Management
- Custom Reports
- System Configurations
- Roles & Permissions
- Incident Reporting
- Page Builder
- Notifications

---

## Requirements Summary

### Functional Requirements
- User Management with RBAC and invitation flows
- Framework, Control, Risk, Policy, and Asset Management (CRUD, linking, status workflows)
- Workflow Management (customizable, drag-and-drop)
- Custom Reports and real-time dashboards
- System Configurations (categories, settings)
- Roles & Permissions (granular, per module)
- Incident Reporting (lifecycle, evidence upload)
- Page Builder (custom UI/pages)
- Notifications (template-based, role-based, email/in-app)

### Non-Functional Requirements
- Security (encryption, RBAC, audit logging)
- Performance (<4s response, 1,000 users)
- Usability (responsive UI, accessibility)
- Availability (95% uptime, DR)
- Maintainability (clean code, docs)

---

## Epics & User Stories

### First Release Epics & User Stories

#### Epic 1: User & Access Management
- As an Admin, I want to invite or create users with roles, so that access is secure and auditable.
- As a User, I want to update my profile and change my password, so that my account is secure.

#### Epic 2: Framework, Control, Risk, Policy, and Asset Management
- As a Compliance Officer, I want to create and manage frameworks, controls, risks, policies, and assets, so that compliance is measurable and traceable.
- As a Compliance Officer, I want to link controls to frameworks, risks, and policies, so that relationships are clear.
- As an Auditor, I want to comment on frameworks, controls, and policies, so that compliance is reviewed.

#### Epic 3: Core Reporting (Basic)
- As a User, I want to view dashboards and lists for all core modules, so that I can track compliance status.

---

### Next Release Epics & User Stories

#### Epic 4: Workflow Management
- As an Admin, I want to configure custom workflows for modules, so that status transitions match our processes.

#### Epic 5: Custom Reports
- As a User, I want to generate and export custom reports, so that I can analyze compliance data as needed.

#### Epic 6: System Configurations
- As an Admin, I want to manage categories and system settings, so that the platform fits our organization.

#### Epic 7: Roles & Permissions
- As an Admin, I want to define granular permissions per module, so that access is controlled and secure.

#### Epic 8: Incident Reporting
- As a User, I want to report incidents with evidence, so that compliance issues are tracked and resolved.
- As an Incident Manager, I want to review, accept/reject, and assign incidents, so that they are resolved efficiently.

#### Epic 9: Page Builder
- As an Admin, I want to build and customize pages, so that the UI can be tailored to our needs.

#### Epic 10: Notifications
- As a User, I want to receive notifications for relevant events, so that I stay informed about important actions.

---

## Technical Tasks
- Design and implement RBAC and user invitation flows
- Build CRUD APIs for all modules (users, incidents, frameworks, risks, controls, policies, assets, categories, roles)
- Implement file upload (evidence, policy documents)
- Develop workflow engine (status transitions, drag-and-drop UI)
- Integrate notification system (template-based, role-based, email/in-app)
- Create reporting engine (real-time metrics, export)
- Implement audit logging for all actions
- Ensure encryption at rest and in transit
- Build responsive, accessible frontend
- Set up automated testing and CI/CD
- Write technical and user documentation

---

## High-Level Architecture

```mermaid
flowchart TD
    subgraph Frontend
        A[Web App: React/Vue/Angular]
        B[Dashboards & Page Builder]
    end
    subgraph Backend
        C[API: Python/Django or Node.js]
        D[RBAC & Auth]
        E[GRC Modules: User, Framework, Control, Risk, Policy, Asset, Incident]
        F[Workflow Engine]
        G[Notification Service]
        H[Reporting Engine]
        I[Audit Logging]
        J[System Config]
    end
    subgraph Storage
        K[(Relational DB: PostgreSQL/MySQL)]
        L[(Object Storage: Files)]
    end
    subgraph Integrations
        M[Email Service]
        N[SSO/External Auth]
    end
    A -- REST/GraphQL --> C
    B -- REST/GraphQL --> C
    C -- DB ORM --> K
    C -- File Upload --> L
    C -- Email --> M
    D -- Auth --> N
    G -- Email --> M
    F -- Status/Workflow --> E
    H -- Data --> K
    I -- Logs --> K
    J -- Settings --> K
```

---

## C4 Architecture Diagrams

### 1. System Context Diagram

```mermaid
C4Context
    title System Context diagram for GRCeek Platform
    Person(admin, "Admin", "Manages users, roles, and system settings")
    Person(compliance_officer, "Compliance Officer", "Manages frameworks, controls, risks, policies, and assets")
    Person(auditor, "Auditor", "Reviews and comments on compliance items")
    Person(incident_manager, "Incident Manager", "Handles incident reports")
    System(grc_platform, "GRCeek Platform", "Web-based GRC management system")
    System_Ext(email_service, "Email Service", "Delivers notifications")
    System_Ext(sso, "SSO/External Auth", "Single Sign-On provider")
    BiRel(admin, grc_platform, "Configures and manages")
    BiRel(compliance_officer, grc_platform, "Uses for GRC operations")
    BiRel(auditor, grc_platform, "Reviews and comments")
    BiRel(incident_manager, grc_platform, "Manages incidents")
    Rel(grc_platform, email_service, "Sends notifications")
    Rel(grc_platform, sso, "Authenticates users")
    UpdateLayoutConfig($c4ShapeInRow="3", $c4BoundaryInRow="1")
```

### 2. Container Diagram

```mermaid
C4Container
    title Container diagram for GRCeek Platform
    Person(admin, "Admin")
    Person(compliance_officer, "Compliance Officer")
    Person(auditor, "Auditor")
    Person(incident_manager, "Incident Manager")
    System_Ext(email_service, "Email Service")
    System_Ext(sso, "SSO/External Auth")
    Container_Boundary(c1, "GRCeek Platform") {
        Container(web_ui, "Web UI", "React/Vue/Angular", "User interface for all roles")
        Container(api, "API Backend", "Python/Django or Node.js", "Business logic and REST API")
        Container(workflow_engine, "Workflow Engine", "Python/Node.js", "Manages status transitions")
        Container(reporting, "Reporting Engine", "Python/Node.js", "Generates reports and dashboards")
        Container(notification, "Notification Service", "Python/Node.js", "Sends notifications")
        Container(auth, "RBAC & Auth", "Python/Node.js", "Authentication and authorization")
        ContainerDb(main_db, "Main DB", "PostgreSQL/MySQL", "Stores all structured data")
        ContainerDb(file_store, "File Store", "Object Storage", "Stores uploaded files")
    }
    Rel(admin, web_ui, "Uses")
    Rel(compliance_officer, web_ui, "Uses")
    Rel(auditor, web_ui, "Uses")
    Rel(incident_manager, web_ui, "Uses")
    Rel(web_ui, api, "API calls")
    Rel(api, workflow_engine, "Manages workflows")
    Rel(api, reporting, "Requests reports")
    Rel(api, notification, "Sends notifications")
    Rel(api, auth, "Handles auth")
    Rel(api, main_db, "Reads/Writes data")
    Rel(api, file_store, "Reads/Writes files")
    Rel(notification, email_service, "Sends emails")
    Rel(auth, sso, "SSO integration")
    UpdateLayoutConfig($c4ShapeInRow="4", $c4BoundaryInRow="1")
```

### 3. Component Diagram (API Backend)

```mermaid
C4Component
    title Component diagram for GRCeek Platform - API Backend
    Container(api, "API Backend", "Python/Django or Node.js", "Business logic and REST API")
    ContainerDb(main_db, "Main DB", "PostgreSQL/MySQL")
    Component(user_mgmt, "User Management", "Python/Node.js", "Handles users and roles")
    Component(framework_mgmt, "Framework Management", "Python/Node.js", "Manages frameworks")
    Component(control_mgmt, "Control Management", "Python/Node.js", "Manages controls")
    Component(risk_mgmt, "Risk Management", "Python/Node.js", "Manages risks")
    Component(policy_mgmt, "Policy Management", "Python/Node.js", "Manages policies")
    Component(asset_mgmt, "Asset Management", "Python/Node.js", "Manages assets")
    Component(incident_mgmt, "Incident Management", "Python/Node.js", "Handles incidents")
    Component(workflow, "Workflow Engine", "Python/Node.js", "Manages status transitions")
    Component(reporting, "Reporting Engine", "Python/Node.js", "Generates reports")
    Component(notification, "Notification Service", "Python/Node.js", "Sends notifications")
    Component(auth, "RBAC & Auth", "Python/Node.js", "Authentication and authorization")
    Rel(api, user_mgmt, "Handles user APIs")
    Rel(api, framework_mgmt, "Handles framework APIs")
    Rel(api, control_mgmt, "Handles control APIs")
    Rel(api, risk_mgmt, "Handles risk APIs")
    Rel(api, policy_mgmt, "Handles policy APIs")
    Rel(api, asset_mgmt, "Handles asset APIs")
    Rel(api, incident_mgmt, "Handles incident APIs")
    Rel(api, workflow, "Handles workflow APIs")
    Rel(api, reporting, "Handles reporting APIs")
    Rel(api, notification, "Handles notification APIs")
    Rel(api, auth, "Handles auth APIs")
    Rel(user_mgmt, main_db, "Reads/Writes users")
    Rel(framework_mgmt, main_db, "Reads/Writes frameworks")
    Rel(control_mgmt, main_db, "Reads/Writes controls")
    Rel(risk_mgmt, main_db, "Reads/Writes risks")
    Rel(policy_mgmt, main_db, "Reads/Writes policies")
    Rel(asset_mgmt, main_db, "Reads/Writes assets")
    Rel(incident_mgmt, main_db, "Reads/Writes incidents")
    Rel(workflow, main_db, "Reads/Writes workflow data")
    Rel(reporting, main_db, "Reads data")
    Rel(notification, main_db, "Reads notification settings")
    Rel(auth, main_db, "Reads/Writes auth data")
    UpdateLayoutConfig($c4ShapeInRow="4", $c4BoundaryInRow="1")
```

---

*This document summarizes the phased scope, requirements, user stories, technical tasks, and architecture for the GRCeek project.*
