<?php

return [
    'navigation' => [
        'label' => 'Controls',
        'group' => 'Foundations',
    ],
    'model' => [
        'label' => 'Control',
        'plural_label' => 'Controls',
    ],
    'breadcrumb' => [
        'title' => 'Controls',
    ],
    'form' => [
        'code' => [
            'tooltip' => 'Enter a unique code for this control. This code will be used to identify this control in the system.',
        ],
        'standard' => [
            'label' => 'Standard',
            'tooltip' => 'All controls must belong to a standard. If you dont have a standard to relate this control to, consider creating a new one first.',
        ],
        'enforcement' => [
            'tooltip' => 'Select an enforcement category for this control. This will help determine how this control is enforced.',
        ],
        'title' => [
            'tooltip' => 'Enter a title for this control.',
        ],
        'description' => [
            'tooltip' => 'Enter a description for this control. This should describe, in detail, the requirements for this control.',
        ],
        'discussion' => [
            'tooltip' => 'Optional: Provide any context or additional information about this control that would help someone determine how to implement it.',
        ],
        'test' => [
            'label' => 'Test Plan',
            'tooltip' => 'Optional: How do you plan to test that this control is in place and effective?',
        ],
    ],
    'table' => [
        'description' => 'Controls are the \'how\' of security implementation - they are the specific mechanisms, policies, procedures, and tools used to enforce standards and protect assets. Controls can be technical (like firewalls or encryption), administrative (like policies or training), or physical (like security cameras or door locks). Each control should be designed to address specific risks and meet particular security requirements defined by standards. For instance, to meet a standard requiring secure data transmission, a control might specify the use of TLS 1.2 or higher for all external communications. Controls are the practical manifestation of security standards and form the backbone of an organization\'s security infrastructure.',
        'empty_state' => [
            'heading' => 'No controls found',
            'description' => 'Get started by importing a standard bundle or creating a new control.',
        ],
        'columns' => [
            'code' => 'Code',
            'title' => 'Title',
            'standard' => 'Standard',
            'type' => 'Type',
            'category' => 'Category',
            'enforcement' => 'Enforcement',
            'effectiveness' => 'Effectiveness',
            'applicability' => 'Applicability',
            'assessed' => 'Last Assessed',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ],
        'filters' => [
            'standard' => 'Standard',
            'effectiveness' => 'Effectiveness',
            'type' => 'Type',
            'category' => 'Category',
            'enforcement' => 'Enforcement',
            'applicability' => 'Applicability',
        ],
    ],
    'infolist' => [
        'section_title' => 'Control Details',
        'test_plan' => 'Test Plan',
    ],
]; 