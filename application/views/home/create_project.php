<?php if(!empty($user && $user['project'] == 'No')){ ?>
    <?= "You Don't have access to view this page" ;die;?>
<?php } ?>

<script>
    $(document).ready(function () {
        $("ul#main-menu > li > a > span:contains('Projects')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('create_project')").parent().parent().addClass("active");
    });
</script>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= site_url('super/view') ?>"><i
                                        class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Employer</li>
                    </ul>
                </div>
            </div>
        </div>
        <form method="post" action="<?= site_url('home/CreateProject')?>" >
        <div class="row clearfix cr-emp">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <h4>Create Project</h4>
                    <div class="body">
                        <div class="form-group row">
                            <label class="col-md-4">Company Name*</label>
                            <div class="col-md-8">
                                <select required name="c_id" class="form-control">
                                    <option hidden>Select Option</option>
                                    <?php foreach ($employer as $v){ ?>
                                    <option value="<?= $v['id']?>"><?= $v['c_name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Job Title*</label>
                            <div class="col-md-8">
                                <input type="text" name="pro_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Description</label>
                            <div class="col-md-8">
                                <textarea name="pro_description" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4">Industry</label>
                            <div class="col-md-8">
                                <select name="industry" class="form-control">
                                    <option hidden>Select Industry</option>
                                    <?php foreach ($industry as $v){ ?>
                                    <option value="<?= $v['industry']?>"><?= $v['industry']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">State</label>
                            <div class="col-md-8">
                                <select name="state" class="form-control">
                                    <option hidden>Select State</option>
                                    <option value="aci">Ashmore and Cartier Islands</option>
                                    <option value="aat">Australian Antarctic Territory</option>
                                    <option value="act">Australian Capital Territory</option>
                                    <option value="ci">Christmas Island</option>
                                    <option value="ki">Cocos (Keeling) Islands</option>
                                    <option value="csi">Coral Sea Islands</option>
                                    <option value="himi">Heard Island and McDonald Islands</option>
                                    <option value="jb">Jervis Bay Territory</option>
                                    <option value="nsw">New South Wales</option>
                                    <option value="ni">Norfolk Island</option>
                                    <option value="nt">Northern Territory</option>
                                    <option value="qld">Queensland</option>
                                    <option value="sa">South Australia</option>
                                    <option value="tas">Tasmania</option>
                                    <option value="vic">Victoria</option>
                                    <option value="wa">Western Australia</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Applicant Required</label>
                            <div class="col-md-8">
                                <input type="text" name="applicant_required" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4"></label>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary pull-right" style="width: 50%">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>

    </div>
</div>

<script>
    var stateLists = {
        USA: {
            "AK": "Alaska",
            "AL": "Alabama",
            "AR": "Arkansas",
            "AS": "American Samoa",
            "AZ": "Arizona",
            "CA": "California",
            "CO": "Colorado",
            "CT": "Connecticut",
            "DC": "District of Columbia",
            "DE": "Delaware",
            "FL": "Florida",
            "FM": "Federated States of Micronesia",
            "GA": "Georgia",
            "GU": "Guam",
            "HI": "Hawaii",
            "IA": "Iowa",
            "ID": "Idaho",
            "IL": "Illinois",
            "IN": "Indiana",
            "KS": "Kansas",
            "KY": "Kentucky",
            "LA": "Louisiana",
            "MA": "Massachusetts",
            "MD": "Maryland",
            "ME": "Maine",
            "MH": "Marshall Islands",
            "MI": "Michigan",
            "MN": "Minnesota",
            "MO": "Missouri",
            "MP": "Northern Mariana Islands",
            "MS": "Mississippi",
            "MT": "Montana",
            "NC": "North Carolina",
            "ND": "North Dakota",
            "NE": "Nebraska",
            "NH": "New Hampshire",
            "NJ": "New Jersey",
            "NM": "New Mexico",
            "NV": "Nevada",
            "NY": "New York",
            "OH": "Ohio",
            "OK": "Oklahoma",
            "OR": "Oregon",
            "PA": "Pennsylvania",
            "PR": "Puerto Rico",
            "PW": "Palau",
            "RI": "Rhode Island",
            "SC": "South Carolina",
            "SD": "South Dakota",
            "TN": "Tennessee",
            "TX": "Texas",
            "UT": "Utah",
            "VA": "Virginia",
            "VI": "Virgin Islands",
            "VT": "Vermont",
            "WA": "Washington",
            "WI": "Wisconsin",
            "WV": "West Virginia",
            "WY": "Wyoming"
        }
        ,
        Canada: {
            "AB": "Alberta",
            "BC": "British Columbia",
            "MB": "Manitoba",
            "NB": "New Brunswick",
            "NL": "Newfoundland",
            "NS": "Nova Scotia",
            "NT": "Northwest Territories",
            "NU": "Nunavut",
            "ON": "Ontario",
            "PE": "Prince Edward Island",
            "QC": "Quebec",
            "SK": "Saskatchewan",
            "YT": "Yukon"
        }
        ,
        Pakistan: {
            "KHI": "Karachi",
            "LHR": "Lahore",
            "QTA": "Quetta",
            "ISL": "Islamabad",
            "ML": "Multan",
            "SU": "Sukkar",

        }


    };

    var select = document.getElementById('state');

    function setStates(el) {
        if (el.value) {
            select.options.length = 0
            var list = stateLists[el.value]
            for (key in list) {
                var opt = document.createElement('option');
                opt.value = key;
                opt.innerHTML = list[key];
                select.appendChild(opt);
            }
        }
    }
</script>
