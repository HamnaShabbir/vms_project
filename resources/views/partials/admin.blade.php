@php
    $entityMenuVisible =
        user()->can('entity.view') ||
        user()->can('location.view') ||
        user()->can('legalStatus.view') ||
        user()->can('lob.view') ||
        user()->can('porductService.view') ||
        user()->can('country.view') ||
        user()->can('city.view') ||
        user()->can('currency.view') ||
        user()->can('function.view') ||
        user()->can('process.view');
    $GovernanceMenuVisible =
        user()->can('governanceBody.view') ||
        user()->can('boardOfDirectors.view') ||
        user()->can('otherCommittee.view') ||
        user()->can('governanceBoard.view');
    $SDGMenuVisible = auth()->user()->can('sdgTarget.view') || auth()->user()->can('sdg.view');
    $SustainibilityReportMenuVisible =
        user()->can('SustainabiliyReportingTeam.view') ||
        user()->can('auditor.view') ||
        user()->can('reportingFramework.view') ||
        user()->can('reportingConvention.view') ||
        user()->can('esgReportingPeriod');
    $materialtopicMenuVisible =
        user()->can('sdg.view') ||
        user()->can('sdgTarget.view') ||
        user()->can('ba.view') ||
        user()->can('bo.view') ||
        user()->can('br.view') ||
        user()->can('sc-br.view') ||
        user()->can('sc-ba.view') ||
        user()->can('sc-sss.view') ||
        user()->can('sc-c.view') ||
        user()->can('sc-s.view') ||
        user()->can('ioi.view') ||
        user()->can('pi.view') ||
        user()->can('ni.view') ||
        user()->can('mtp.view') ||
        user()->can('materialTopicChange.view') ||
        user()->can('materialTopicMapping.view') ||
        user()->can('materialTopicContent.view');
    $materialTopicSetupMenueVisible =
        user()->can('marketsServed.view') ||
        user()->can('industorySector.view') ||
        user()->can('industrychracteristics.view') ||
        user()->can('employeeType.view') ||
        user()->can('workerType.view') ||
        user()->can('ageGroup.view') ||
        user()->can('relationship.view') ||
        user()->can('workPerformed.view') ||
        user()->can('relationshipType.view') ||
        user()->can('buisnessPartnerLocation.view') ||
        user()->can('buisnessPartner.view') ||
        user()->can('businessActivityFactor.view') ||
        user()->can('businessRelationshipFactor.view') ||
        user()->can('impactType.view') ||
        user()->can('impactScope.view') ||
        user()->can('sectorStandard.view') ||
        user()->can('complianceType.view') ||
        user()->can('insturment.view') ||
        user()->can('stakeholderCategory.view') ||
        user()->can('stakeholderGroup.view') ||
        user()->can('engagementType.view') ||
        user()->can('source.view') ||
        user()->can('likelihood.view') ||
        user()->can('positiveImpactType.view') ||
        user()->can('severityAssessment.view') ||
        user()->can('orr.view') ||
        user()->can('reportingThreshold.view') ||
        user()->can('expert.view') ||
        user()->can('authority.view') ||
        user()->can('actionEffectiveness.view') ||
        user()->can('progress.view') ||
        user()->can('trackingMethod.view') ||
        user()->can('conclusion.view') ||
        user()->can('stakeholder.view') ||
        user()->can('MaterialTopicSetup.view');
    $ourActionMenueVisible =
        user()->can('managingNegativeImpact.view') ||
        user()->can('managingPositiveImpact.view') ||
        user()->can('EffectivenessOfAction.view') ||
        user()->can('budgetUtilization.view') ||
        user()->can('sdgImpact.view') ||
        user()->can('auditObservation.view');
    $wasteSetupMenueVisible =
        user()->can('unitOfMeasure.view') ||
        user()->can('wasteCompositions.view') ||
        user()->can('recoveryMethod.view') ||
        user()->can('ComplianceCheckingProcedure.view') ||
        user()->can('disposalMethod.view') ||
        user()->can('wastepreventionActionType.view') ||
        user()->can('dataCompilation.view');
    $energySetupMenueVisible =
        user()->can('energyResourceType.view') ||
        user()->can('energyFuelType.view') ||
        user()->can('energyType.view') ||
        user()->can('unitOfMeasure.view') ||
        user()->can('organizationSpecificMetric.view') ||
        user()->can('valueChainStage.view') ||
        ($wasteWorkbokkMenueVisible =
            user()->can('wasteGenerationImpact.view') ||
            user()->can('wasteTracking.view') ||
            user()->can('wasteRecovered.view') ||
            user()->can('wasteDisposed.view'));
    $diversitySetupMenueVisible =
        user()->can('employeeFunctionMaster.view') ||
        user()->can('employee.view') ||
        user()->can('otherDiversity.view') ||
        user()->can('boardOfDirectors.view') ||
        user()->can('significantLocation.view');
    user()->can('managementLevel.view');
    $reportMenueVisible =
        user()->can('entityInformationReport.view') ||
        user()->can('SustainabilityReportingImpactsReport.view') ||
        user()->can('FinancialImplicationReport.view') ||
        user()->can('EntityActionReport.view') ||
        user()->can('BudgetUtilizationReport.view') ||
        user()->can('Impact360Report.view');
@endphp
<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link active">
        <i class="nav-icon fas fa-home"></i>
        <p>
            Home
        </p>
    </a>
</li>
@if ($entityMenuVisible)
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-building"></i>
            <p>
                Entity Information
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @can('entity.view')
                <li class="nav-item">
                    <a href="{{ route('entity.index', ['entity' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Entity
                        </p>
                    </a>
                </li>
            @endcan
            @can('location.view')
                <li class="nav-item">
                    <a href="{{ route('location.index', ['location' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Locations
                        </p>
                    </a>
                </li>
            @endcan
            @can('legalStatus.view')
                <li class="nav-item">
                    <a href="{{ route('legalStatus.index', ['legalStatus' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Legal Status
                        </p>
                    </a>
                </li>
            @endcan
            @can('lob.view')
                <li class="nav-item">
                    <a href="{{ route('lineofbusiness.index', ['lob' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Line of Business
                        </p>
                    </a>
                </li>
            @endcan
            @can('porductService.view')
                <li class="nav-item">
                    <a href="{{ route('productService.index', ['productService' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Product / Services
                        </p>
                    </a>
                </li>
            @endcan
            @can('country.view')
                <li class="nav-item">
                    <a href="{{ route('country.index', ['country' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p class="info">
                            Country
                        </p>
                    </a>
                </li>
            @endcan
            @can('city.view')
                <li class="nav-item">
                    <a href="{{ route('city.index', ['city' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p class="info">
                            City
                        </p>
                    </a>
                </li>
            @endcan
            @can('currency.view')
                <li class="nav-item">
                    <a href="{{ route('currency.index', ['currency' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Currency
                        </p>
                    </a>
                </li>
            @endcan
            @can('function.view')
                <li class="nav-item">
                    <a href="{{ route('function.index', ['function' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Functions
                        </p>
                    </a>
                </li>
            @endcan
            @can('process.view')
                <li class="nav-item">
                    <a href="{{ route('process.index', ['process' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Process
                        </p>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endif
@if ($GovernanceMenuVisible)
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fa fa-university "></i>
            <p>
                Organization Governance
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @can('governanceBody.view')
                <li class="nav-item">
                    <a href="{{ route('governanceBody.index', ['governanceBody' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Governance Body
                        </p>
                    </a>
                </li>
            @endcan
            @can('boardOfDirectors.view')
                <li class="nav-item">
                    <a href="{{ route('boardOfDirectors.index', ['boardOfDirectors' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Board Of Directors
                        </p>
                    </a>
                </li>
            @endcan
            @can('otherCommittee.view')
                <li class="nav-item">
                    <a href="{{ route('boardCommittee.index', ['boardCommittee' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Other Committees
                        </p>
                    </a>
                </li>
            @endcan
            @can('governanceBoard.view')
                <li class="nav-item">
                    <a href="{{ route('governanceBoard.index', ['governanceBoard' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            governance Board
                        </p>
                    </a>
                </li>
            @endcan
            {{-- <li class="nav-item">
            <a href="{{ route('executiveCommittee.index',['executiveCommittee'=>'all']) }}" class="nav-link">
                <i class="nav-icon-right fas fa-arrow-right "></i>
                <p>
                    Executive Committee
                </p>
            </a>
        </li> --}}
        </ul>
    </li>
@endif
@if ($SDGMenuVisible)
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fa fa-leaf"></i>
            <p>
                Sustainability Horizon
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @can('sdg.view')
                <li class="nav-item">
                    <a href="{{ route('SDG.index', ['SDG' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            SDGs
                        </p>
                    </a>
                </li>
            @endcan
            @can('sdgTarget.view')
                <li class="nav-item">
                    <a href="{{ route('target.index', ['target' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            SDGs Targets
                        </p>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endif
@if ($SustainibilityReportMenuVisible)
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file "></i>
            <p>
                Sustainability Reporting
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @can('SustainabiliyReportingTeam.view')
                <li class="nav-item">
                    <a href="{{ route('SustainabiliyReportingTeam.index', ['SustainabiliyReportingTeam' => 'all']) }}"
                        class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Sustainabiliy Reporting Team
                        </p>
                    </a>
                </li>
            @endcan
            @can('auditor.view')
                <li class="nav-item">
                    <a href="{{ route('auditor.index', ['auditor' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Auditor
                        </p>
                    </a>
                </li>
            @endcan
            @can('reportingFramework.view')
                <li class="nav-item">
                    <a href="{{ route('framework.index', ['framework' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Reporting Framework
                        </p>
                    </a>
                </li>
            @endcan
            @can('reportingConvention.view')
                <li class="nav-item">
                    <a href="{{ route('reportingConvention.index', ['reportingConvention' => 'all']) }}"
                        class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Reporting Convention
                        </p>
                    </a>
                </li>
            @endcan
            {{-- @can('reportingCurrency.view')
            <li class="nav-item">
                <a href="{{ route('reportingCurrency.index', ['reportingCurrency' => 'all']) }}"
                    class="nav-link">
                    <i class="nav-icon-right fas fa-arrow-right "></i>
                    <p>
                        Reporting Currency
                    </p>
                </a>
            </li>
        @endcan --}}
            @can('esgReportingPeriod.view')
                <li class="nav-item">
                    <a href="{{ route('esgReport.index', ['esgReport' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            ESG Reporting period
                        </p>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endif
@if ($materialtopicMenuVisible || $materialTopicSetupMenueVisible)
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tasks "></i>
            <p>
                Material Topics
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @can('ba.view')
                <li class="nav-item">
                    <a href="{{ route('businessActivity.index', ['businessActivity' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Business Activity
                        </p>
                    </a>
                </li>
            @endcan
            @can('bo.view')
                <li class="nav-item">
                    <a href="{{ route('businessOperation.index', ['businessOperation' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Business Operations
                        </p>
                    </a>
                </li>
            @endcan
            @can('br.view')
                <li class="nav-item">
                    <a href="{{ route('businessRelationship.index', ['businessRelationship' => 'all']) }}"
                        class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Business Relationships
                        </p>
                    </a>
                </li>
            @endcan
            @can('sc-ba.view')
                <li class="nav-item">
                    <a href="{{ route('sustainabiltyBusinessActivity.index', ['sustainabiltyBusinessActivity' => 'all']) }}"
                        class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right"></i>
                        <p>
                            Sustainability Context - Business Operation </p>
                    </a>
                </li>
            @endcan
            @can('sc-br.view')
                <li class="nav-item">
                    <a href="{{ route('sustainabiltyRelationship.index', ['sustainabiltyRelationship' => 'all']) }}"
                        class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Sustainability Context – Business Relationship </p>
                    </a>
                </li>
            @endcan
            @can('sc-sss.view')
                <li class="nav-item">
                    <a href="{{ route('sectorSpecificStandards.index', ['sectorSpecificStandards' => 'all']) }}"
                        class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Sustainability Context – Sector Specific Standards </p>
                    </a>
                </li>
            @endcan
            @can('sc-c.view')
                <li class="nav-item">
                    <a href="{{ route('complaince.index', ['complaince' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Sustainability Context – Compliance </p>
                    </a>
                </li>
            @endcan
            @can('sc-s.view')
                <li class="nav-item">
                    <a href="{{ route('SustainabiltyStakeholder.index', ['SustainabiltyStakeholder' => 'all']) }}"
                        class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Stakeholder Analysis </p>
                    </a>
                </li>
            @endcan
            @can('ioi.view')
                <li class="nav-item">
                    <a href="{{ route('impactIdentification.index', ['impactIdentification' => 'all']) }}"
                        class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Identification of Impact </p>
                    </a>
                </li>
            @endcan
            @can('pi.view')
                <li class="nav-item">
                    <a href="{{ route('positiveImpact.index', ['positiveImpact' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Positive Impact </p>
                    </a>
                </li>
            @endcan
            @can('ni.view')
                <li class="nav-item">
                    <a href="{{ route('negativeImpact.index', ['negativeImpact' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            negative Impact </p>
                    </a>
                </li>
            @endcan
            @can('mtp.view')
                <li class="nav-item">
                    <a href="{{ route('materialTopicPolicy.index', ['materialTopicPolicy' => 'all']) }}"
                        class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            material Topic Policies </p>
                    </a>
                </li>
            @endcan
            @can('test.view')
                <li class="nav-item">
                    <a href="{{ route('testAndApproval.index') }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Test and approval </p>
                    </a>
                </li>
            @endcan
            @can('materialTopicChange.view')
                <li class="nav-item">
                    <a href="{{ route('materialTopicChange.index', ['materialTopicChange' => 'all']) }}"
                        class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Material Topic Changes
                        </p>
                    </a>
                </li>
            @endcan
            @can('materialTopicContent.view')
                <li class="nav-item">
                    <a href="{{ route('materialtopicContent.index') }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Material Topics Content
                        </p>
                    </a>
                </li>
            @endcan
            @can('materialTopicMapping.view')
                <li class="nav-item">
                    <a href="{{ route('materialTopicMapping.index', ['materialTopicMapping' => 'all']) }}"
                        class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Material Topics and SDGs Mapping
                        </p>
                    </a>
                </li>
            @endcan
            @if ($materialTopicSetupMenueVisible)
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class=" fa fa-arrow-right nav-icon-right"></i>
                        <p>
                            Setup
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('marketsServed.view')
                            <li class="nav-item">
                                <a href="{{ route('marketsServed.index', ['marketsServed' => 'all']) }}"
                                    class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Markets Served
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('industorySector.view')
                            <li class="nav-item">
                                <a href="{{ route('industrySector.index', ['industrySector' => 'all']) }}"
                                    class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Industry Sector
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('industrychracteristics.view')
                            <li class="nav-item">
                                <a href="{{ route('IndustryChracteristcs.index', ['IndustryChracteristcs' => 'all']) }}"
                                    class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Industry Chracteristics
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('employeeType.view')
                            <li class="nav-item">
                                <a href="{{ route('employeeType.index', ['employeeType' => 'all']) }}" class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Employee Type
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('workerType.view')
                            <li class="nav-item">
                                <a href="{{ route('workersType.index', ['workersType' => 'all']) }}" class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Workers Type
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('ageGroup.view')
                            <li class="nav-item">
                                <a href="{{ route('ageGroup.index', ['ageGroup' => 'all']) }}" class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Age Group
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('relationship.view')
                            <li class="nav-item">
                                <a href="{{ route('relationship.index', ['relationship' => 'all']) }}" class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Relationship
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('workPerformed.view')
                            <li class="nav-item">
                                <a href="{{ route('workPerformed.index', ['workPerformed' => 'all']) }}"
                                    class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Work Performed
                                    </p>
                                </a>
                            </li>
                        @endcan
                        {{-- </li> --}}
                        @can('relationshipType.view')
                            <li class="nav-item">
                                <a href="{{ route('relationshipType.index', ['relationshipType' => 'all']) }}"
                                    class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Relationship Type
                                    </p>
                                </a>
                            </li>
                        @endcan
                        {{-- </li> --}}
                        @can('buisnessPartnerLocation.view')
                            <li class="nav-item">
                                <a href="{{ route('partnerLocation.index', ['partnerLocation' => 'all']) }}"
                                    class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Business Partner Location
                                    </p>
                                </a>
                            </li>
                        @endcan
                        {{-- </li> --}}
                        @can('buisnessPartner.view')
                            <li class="nav-item">
                                <a href="{{ route('businessPartner.index', ['businessPartner' => 'all']) }}"
                                    class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Business Partner
                                    </p>
                                </a>
                            </li>
                        @endcan
                        {{-- </li> --}}
                        @can('businessActivityFactor.view')
                            <li class="nav-item">
                                <a href="{{ route('businessActivityFactor.index', ['businessActivityFactor' => 'all']) }}"
                                    class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Business Activity Factor
                                    </p>
                                </a>
                            </li>
                        @endcan
                        {{-- </li> --}}
                        @can('businessRelationshipFactor.view')
                            <li class="nav-item">
                                <a href="{{ route('businessRelationshipFactor.index', ['businessRelationshipFactor' => 'all']) }}"
                                    class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Business Relationship Factor
                                    </p>
                                </a>
                                {{-- </li> --}}
                            </li>
                        @endcan
                        @can('stakeholder.view')
                            <li class="nav-item">
                                <a href="{{ route('stakeholder.index', ['stakeholder' => 'all']) }}" class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        stakeholder
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('impactType.view')
                            <li class="nav-item">
                                <a href="{{ route('impactType.index', ['impactType' => 'all']) }}" class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Impact Type
                                    </p>
                                </a>
                            </li>
                        @endcan
                        {{-- </li> --}}
                        @can('impactScope.view')
                            <li class="nav-item">
                                <a href="{{ route('impactScope.index', ['impactScope' => 'all']) }}" class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Impact Scope
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('sectorStandard.view')
                            <li class="nav-item">
                                <a href="{{ route('sectorStandard.index', ['sectorStandard' => 'all']) }}"
                                    class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Sector Standard
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('complianceType.view')
                            <li class="nav-item">
                                <a href="{{ route('complianceType.index', ['complianceType' => 'all']) }}"
                                    class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Compliance Type
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('insturment.view')
                            <li class="nav-item">
                                <a href="{{ route('instrument.index', ['instrument' => 'all']) }}" class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Insturment
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('stakeholderCategory.view')
                            <li class="nav-item">
                                <a href="{{ route('stakeholderCategory.index', ['stakeholderCategory' => 'all']) }}"
                                    class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        stakeholder Category
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('stakeholderGroup.view')
                            <li class="nav-item">
                                <a href="{{ route('stakeholderGroup.index', ['stakeholderGroup' => 'all']) }}"
                                    class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Stakeholder Group
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('engagementType.view')
                            <li class="nav-item">
                                <a href="{{ route('engagementType.index', ['engagementType' => 'all']) }}"
                                    class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Engagement Type
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('source.view')
                            <li class="nav-item">
                                <a href="{{ route('source.index', ['source' => 'all']) }}" class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        source
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('likelihood.view')
                            <li class="nav-item">
                                <a href="{{ route('likelihood.index', ['likelihood' => 'all']) }}" class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        likelihood
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('positiveImpactType.view')
                            <li class="nav-item">
                                <a href="{{ route('positiveImpactType.index', ['positiveImpactType' => 'all']) }}"
                                    class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        positive Impact Type
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('severityAssessment.view')
                            <li class="nav-item">
                                <a href="{{ route('severityAssisment.index', ['severityAssisment' => 'all']) }}"
                                    class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Severity Assessment
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('orr.view')
                            <li class="nav-item">
                                <a href="{{ route('orr.index', ['orr' => 'all']) }}" class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Overall Risk Rating
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('reportingThreshold.view')
                            <li class="nav-item">
                                <a href="{{ route('threshold.index', ['threshold' => 'all']) }}" class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Reporting Threshold
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('expert.view')
                            <li class="nav-item">
                                <a href="{{ route('expert.index', ['expert' => 'all']) }}" class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Expert
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('authority.view')
                            <li class="nav-item">
                                <a href="{{ route('authority.index', ['authority' => 'all']) }}" class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Authoriy
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('trackingMethod.view')
                            <li class="nav-item">
                                <a href="{{ route('trackingMethod.index', ['trackingMethod' => 'all']) }}"
                                    class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        tracking method
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('actionEffectiveness.view')
                            <li class="nav-item">
                                <a href="{{ route('actionEffectiveness.index', ['actionEffectiveness' => 'all']) }}"
                                    class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        actions Effectiveness
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('progress.view')
                            <li class="nav-item">
                                <a href="{{ route('progress.index', ['progress' => 'all']) }}" class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Progress
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('MaterialTopicSetup.view')
                            <li class="nav-item">
                                <a href="{{ route('MaterialTopicSetup.index', ['MaterialTopicSetup' => 'all']) }}"
                                    class="nav-link">
                                    <i class="nav-icon-right far fa-circle "></i>
                                    <p>
                                        Material Topic
                                    </p>
                                </a>
                            </li>
                        @endcan
                        {{-- @can('conclusion.view')
                    <li class="nav-item">
                        <a href="{{ route('conclusion.index', ['conclusion' => 'all']) }}"
                            class="nav-link">
                            <i class="nav-icon-right far fa-circle "></i>
                            <p>
                                Conclusion
                            </p>
                        </a>
                    </li>
                @endcan --}}
                    </ul>
                </li>
            @endif
        </ul>
    </li>
@endif
@if ($ourActionMenueVisible)
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-directions" aria-hidden="true"></i>
            <p>
                Our Actions
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @can('managingNegativeImpact.view')
                <li class="nav-item">
                    <a href="{{ route('managingNegativeImpact.index', ['managingNegativeImpact' => 'all']) }}"
                        class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Managing Negative Impact
                        </p>
                    </a>
                </li>
            @endcan
            @can('managingPositiveImpact.view')
                <li class="nav-item">
                    <a href="{{ route('managingPositiveImpact.index', ['managingPositiveImpact' => 'all']) }}"
                        class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Managing Positive Impact
                        </p>
                    </a>
                </li>
            @endcan
            @can('EffectivenessOfAction.view')
                <li class="nav-item">
                    <a href="{{ route('EffectivenessOfAction.index', ['EffectivenessOfAction' => 'all']) }}"
                        class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Effectiveness of Action
                        </p>
                    </a>
                </li>
            @endcan
            @can('budgetUtilization.view')
                <li class="nav-item">
                    <a href="{{ route('budgetUtilization.index', ['budgetUtilization' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Budget Utilization
                        </p>
                    </a>
                </li>
            @endcan
            @can('sdgImpact.view')
                <li class="nav-item">
                    <a href="{{ route('sdgImpact.index', ['sdgImpact' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            SDGs Impact
                        </p>
                    </a>
                </li>
            @endcan
            @can('auditObservation.view')
                <li class="nav-item">
                    <a href="{{ route('auditObservation.index', ['auditObservation' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            audit Observation
                        </p>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endif
@if ($wasteSetupMenueVisible || $wasteWorkbokkMenueVisible)
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon far fa-plus-square"></i>
            <p>
                Environmental
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class=" fa fa-arrow-right nav-icon-right"></i>
                    <p>
                        Waste
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('waste_generation.index', ['waste_generation' => 'all']) }}"
                            class="nav-link">
                            <i class="nav-icon-right fas fa-arrow-right "></i>
                            <p>
                                Waste Generations
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('wasteRecovery.index', ['wasteRecovery' => 'all']) }}" class="nav-link">
                            <i class="nav-icon-right fas fa-arrow-right "></i>
                            <p>
                                Waste Recovery Register
                            </p>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="{{ route('wasteRecoveryNote.index', ['wasteRecoveryNote' => 'all']) }}"
                            class="nav-link">
                            <i class="nav-icon-right fas fa-arrow-right "></i>
                            <p>
                                Waste Recovery Note
                            </p>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="{{ route('wasteDisposal.index', ['wasteDisposal' => 'all']) }}" class="nav-link">
                            <i class="nav-icon-right fas fa-arrow-right "></i>
                            <p>
                                Waste Disposal Register
                            </p>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="{{ route('wasteDisposalNote.index', ['wasteDisposalNote' => 'all']) }}"
                            class="nav-link">
                            <i class="nav-icon-right fas fa-arrow-right "></i>
                            <p>
                                Waste Disposal Note
                            </p>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="{{ route('wasteLedger.index', ['wasteLedger' => 'all']) }}" class="nav-link">
                            <i class="nav-icon-right fas fa-arrow-right "></i>
                            <p>
                                Waste Ledger
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('wasteTracking.index', ['wasteTracking' => 'all']) }}" class="nav-link">
                            <i class="nav-icon-right fas fa-arrow-right "></i>
                            <p>
                                Waste Tracking
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('wasteTrackingReport.index', ['wasteTrackingReport' => 'all']) }}"
                            class="nav-link">
                            <i class="nav-icon-right fas fa-arrow-right "></i>
                            <p>
                                Waste Tracking Report
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('wastePreventionAction.index', ['wastePreventionAction' => 'all']) }}"
                            class="nav-link">
                            <i class="nav-icon-right fas fa-arrow-right "></i>
                            <p>
                                Waste Prevention Action
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('significantWasteManagement.index', ['significantWasteManagement' => 'all']) }}"
                            class="nav-link">
                            <i class="nav-icon-right fas fa-arrow-right "></i>
                            <p>
                                Significant Waste Management
                            </p>
                        </a>
                    </li>
                    @if ($wasteSetupMenueVisible)
                        <li class="nav-item ">
                            <a href="" class="nav-link">
                                <i class="nav-icon-right far fa-circle "></i>
                                <p>
                                    Setup
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                {{-- <li class="nav-item">
                            <a href="{{ route('vChainStage.index', ['vChainStage' => 'all']) }}"
                                class="nav-link">
                                <i class="far fa-dot-circle nav-icon-right"></i>
                                <p>
                                    Value Chain Stages
                                </p>
                            </a>
                        </li> --}}
                                {{-- <li class="nav-item">
                            <a href="{{ route('wasteType.index', ['wasteType' => 'all']) }}"
                                class="nav-link">
                                <i class="far fa-dot-circle nav-icon-right"></i>
                                <p>
                                    Waste Types
                                </p>
                            </a>
                        </li> --}}
                                @can('unitOfMeasure.view')
                                    <li class="nav-item">
                                        <a href="{{ route('measureUnit.index', ['measureUnit' => 'all']) }}"
                                            class="nav-link">
                                            <i class="far fa-dot-circle nav-icon-right"></i>
                                            <p>
                                                Unit Of Measure
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('wasteCompositions.view')
                                    <li class="nav-item">
                                        <a href="{{ route('wasteComposition.index', ['wasteComposition' => 'all']) }}"
                                            class="nav-link">
                                            <i class="far fa-dot-circle nav-icon-right"></i>
                                            <p>
                                                Waste Compositions
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('recoveryMethod.view')
                                    <li class="nav-item">
                                        <a href="{{ route('recoveryMethod.index', ['recoveryMethod' => 'all']) }}"
                                            class="nav-link">
                                            <i class="far fa-dot-circle nav-icon-right"></i>
                                            <p>
                                                Recovery Method
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('ComplianceCheckingProcedure.view')
                                    <li class="nav-item">
                                        <a href="{{ route('compCheckProcedure.index', ['compCheckProcedure' => 'all']) }}"
                                            class="nav-link">
                                            <i class="far fa-dot-circle nav-icon-right"></i>
                                            <p>
                                                compliance checking
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('disposalMethod.view')
                                    <li class="nav-item">
                                        <a href="{{ route('disposalMethod.index', ['disposalMethod' => 'all']) }}"
                                            class="nav-link">
                                            <i class="far fa-dot-circle nav-icon-right"></i>
                                            <p>
                                                Disposal Method
                                            </p>
                                        </a>
                                    </li>
                                @endcan


                                @can('wastepreventionActionType.view')
                                    <li class="nav-item">
                                        <a href="{{ route('WastePreventActionType.index', ['WastePreventActionType' => 'all']) }}"
                                            class="nav-link">
                                            <i class="far fa-dot-circle nav-icon-right"></i>
                                            <p>
                                                Waste Prevent Action Type
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('dataCompilation.view')
                                    <li class="nav-item">
                                        <a href="{{ route('dataCompilation.index', ['dataCompilation' => 'all']) }}"
                                            class="nav-link">
                                            <i class="far fa-dot-circle nav-icon-right"></i>
                                            <p>
                                                Data Compilation
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                        @if ($wasteWorkbokkMenueVisible)
                        @endif
                    @endif
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class=" fa fa-arrow-right nav-icon-right"></i>
                    <p>
                        Energy
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('energyResourceType.index', ['energyResourceType' => 'all']) }}"
                            class="nav-link">
                            <i class="nav-icon-right fas fa-arrow-right "></i>
                            <p>
                                Resource Type
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('energyFuelType.index', ['energyFuelType' => 'all']) }}" class="nav-link">
                            <i class="nav-icon-right fas fa-arrow-right "></i>
                            <p>
                                Fuel Type
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('energyType.index', ['energyType' => 'all']) }}" class="nav-link">
                            <i class="nav-icon-right fas fa-arrow-right "></i>
                            <p>
                                Energy Type
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('organizationSpecificMetric.index', ['organizationSpecificMetric' => 'all']) }}"
                            class="nav-link">
                            <i class="nav-icon-right fas fa-arrow-right "></i>
                            <p>
                                Organization Specific Metric
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('valueChainStage.index', ['valueChainStage' => 'all']) }}"
                            class="nav-link">
                            <i class="nav-icon-right fas fa-arrow-right "></i>
                            <p>
                                Value Chain Stage Category Master
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('unitOfMeasure.index', ['unitOfMeasure' => 'all']) }}" class="nav-link">
                            <i class="nav-icon-right fas fa-arrow-right "></i>
                            <p>
                                Unit of Measure Master
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
@endif
@if ($diversitySetupMenueVisible)
@endif
@if ($diversitySetupMenueVisible)
@endif
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon far fa-plus-square"></i>
        <p>
            Diversity
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('employeeGenderCategory.index', ['employeeGenderCategory' => 'all']) }}"
                class="nav-link">
                <i class="nav-icon-right fas fa-arrow-right "></i>
                <p>
                    Employee Gender By Catergory Report
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('employeeAgeReport.index', ['employeeAgeReport' => 'all']) }}" class="nav-link">

                <i class="nav-icon-right fas fa-arrow-right "></i>
                <p>
                    Employee Age Report
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('OtherDiversityReport.index', ['OtherDiversityReport' => 'all']) }}" class="nav-link">
                <i class="nav-icon-right fas fa-arrow-right "></i>
                <p>
                    Other Diversity Report
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('employeeLocation.index', ['employeeLocation' => 'all']) }}" class="nav-link">
                <i class="nav-icon-right fas fa-arrow-right "></i>
                <p>
                    Salary Ratio Report
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class=" fa fa-arrow-right nav-icon-right"></i>
                <p>
                    Setup
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <!-- ------------------- -->
                @can('employeeFunctionMaster.view')
                @endcan
                <li class="nav-item">
                    <a href="{{ route('employeeFunctionMaster.index', ['employeeFunctionMaster' => 'all']) }}"
                        class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Employee Function
                        </p>
                    </a>
                </li>
                @can('employee.view')
                @endcan
                <li class="nav-item">
                    <a href="{{ route('employee.index', ['employee' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Employee
                        </p>
                    </a>
                </li>
                @can('otherDiversity.view')
                @endcan
                <li class="nav-item">
                    <a href="{{ route('otherDiversity.index', ['otherDiversity' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Other Diversity
                        </p>
                    </a>
                </li>
                @can('boardOfDirectors.view')
                @endcan
                <li class="nav-item">
                    <a href="{{ route('diversityBoardOfDirectors.index', ['diversityBoardOfDirectors' => 'all']) }}"
                        class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Board of directors
                        </p>
                    </a>
                </li>

                @can('significantLocation.view')
                @endcan
                <li class="nav-item">
                    <a href="{{ route('significantLocation.index', ['significantLocation' => 'all']) }}"
                        class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Significant Location
                        </p>
                    </a>
                </li>
                @can('managementLevel.view')
                @endcan
                <li class="nav-item">
                    <a href="{{ route('managementLevel.index', ['managementLevel' => 'all']) }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Management Level
                        </p>
                    </a>
                </li>
                <!-- ------------------- -->
            </ul>
        </li>
    </ul>
</li>
@if ($reportMenueVisible)
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>
                Reports
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @can('entityInformationReport.view')
                <li class="nav-item">
                    <a href="{{ route('entityInformationReport.index') }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Entity Information Report
                        </p>
                    </a>
                </li>
            @endcan
            @can('SustainabilityReportingImpactsReport.view')
                <li class="nav-item">
                    <a href="{{ route('sustainabilityImpactReport.index') }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Sustainability Reporting Impact Report
                        </p>
                    </a>
                </li>
            @endcan
            @can('FinancialImplicationReport.view')
                <li class="nav-item">
                    <a href="{{ route('financialImplicationReport.index') }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Financial Implication Report
                        </p>
                    </a>
                </li>
            @endcan
            @can('EntityActionReport.view')
                <li class="nav-item">
                    <a href="{{ route('entityActionReport.index') }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Entity Action Report
                        </p>
                    </a>
                </li>
            @endcan
            @can('BudgetUtilizationReport.view')
                <li class="nav-item">
                    <a href="{{ route('BudgetUtilizationReport.index') }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Budget Utilization Report
                        </p>
                    </a>
                </li>
            @endcan
            @can('Impact360Report.view')
                <li class="nav-item">
                    <a href="{{ route('impact360Report.index') }}" class="nav-link">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Impact 360 Degree Report
                        </p>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endif
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cogs"></i>
        <p>
            Settings
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="nav-icon-right fas fa-arrow-right "></i>
                <p>
                    Profile settings
                </p>
            </a>
        </li>
        {{-- @can('role.view') --}}
        <li class="nav-item">
            <a href="{{ route('role.index', ['role' => 'all']) }}" class="nav-link">
                <i class="nav-icon-right fas fa-arrow-right "></i>
                <p>
                    Roles
                </p>
            </a>
        </li>
        {{-- @endcan --}}

        {{-- <li class="nav-item">
            <a href="{{ route('stages.index') }}"
                class="nav-link">
                <i class="nav-icon-right fas fa-arrow-right "></i>
                <p>
                    Stages
                </p>
            </a>
        </li> --}}
    </ul>
</li>
