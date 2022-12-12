<?php

namespace Deegitalbe\LaravelTrustupIoProjects\Enums;

/**
 * Available project app keys.
 */
enum ProjectAppKey: string
{
    case ADMIN_TRUSTUP_PRO = "trustup-pro-admin";
    case TRUSTUP_PRO = "trustup-pro";
    case TRUSTUP_PRO_FACTURATION = "trustup-pro-facturation";
    case TRUSTUP_PRO_PLANNING = "trustup-pro-planning";
    case TRUSTUP_PRO_CHANTIERS = "trustup-pro-chantiers";
    case TRUSTUP_PRO_INTERVENTIONS = "trustup-pro-interventions";
    case TRUSTUP = "trustup";
    case ERP = "erp";
    case WEBSITE_MANAGER = "website-manager";
    case TRUSTUP_IO_CHANGELOG = "trustup-io-changelog";
    case TRUSTUP_IO_TICKETING = "trustup-io-ticketing";
}
