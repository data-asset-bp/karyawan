<!-- tambah data karyawan -->
<div class="modal fade" id="tambah_karyawan">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Employee Data</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <script src="jquery-1-10-1.min.js"></script>
            <form method="post">
                <div class="modal-body">
                    <label>NRP</label>
                    <input type="text" name="nrp" placeholder="NRP" class="form-control" required>
                    <br>
                    <label>Nama Karyawan</label>
                    <input type="text" name="nama" placeholder="Nama Karyawan" class="form-control" required>
                    <br>
                    <label>Office</label>
                    <select id="office" name="ho" class="form-control" required>
                        <option value="" selected disabled>Pilih Office</option>
                        <option value="ho">HO</option>
                        <option value="cabang">Cabang</option>
                    </select>
                    <br>
                    <label>Divisi</label>
                    <select id="divisi" name="div" class="form-control" required>
                        <option value="">Pilih Divisi</option>
                    </select>
                    <br>
                    <label>Branch Area</label>
                    <select id="branch" name="ba" class="form-control" required>
                        <option value="">Pilih Branch Area</option>
                    </select>
                    <br>
                    <label>Personal Area</label>
                    <select id="personal" name="pa" class="form-control" required>
                        <option value="">Pilih Personal Area</option>
                    </select>
                    <br>
                    <label>Position</label>
                    <input type="text" name="position" placeholder="Position" class="form-control" required>
                    <br>
                    <button type="submit" class="btn btn-primary" name="tambah_karyawan">Submit</button>
                </div>
            </form>
            <script>
                $(function() { // sama dengan $(document).ready(function(){
                    const divisiHo = [
                        "BOD",
                        "CORPORATE FUNCTION",
                        "MARKETING & MATERIAL MANAGEMENT",
                        "PEOPLE & INFRASTRUCTURE",
                        "PRODUCT SUPPORT & ENGINEERING",
                        "SALES & BRANCH OPERATION",
                        "FINANCE, ACCOUNTING & PROCUREMENT"

                    ]

                    const divisiCabang = ["BRANCH OPERATIONS"]

                    const baHo = ["HO"]
                    const baCabang = [
                        "BJM",
                        "BLP",
                        "FRP",
                        "JKT",
                        "PKB",
                        "SBY",
                        "SDP",
                        "SMD",
                        "TBT",
                    ]

                    $('#office').change(function(e) {
                        const office = e.target.value

                        const divisi = $('#divisi')
                        const branchArea = $('#branch')
                        const personalArea = $('#personal')

                        divisi.empty()
                        divisi.append('<option value="" selected disabled>Pilih Divisi</option>')

                        branchArea.empty()
                        branchArea.append('<option value="" selected disabled>Pilih Branch Area</option>')

                        personalArea.empty()
                        personalArea.append('<option value="" selected disabled>Pilih Personal Area</option>')

                        if (office === 'ho') {
                            divisiHo.forEach(divisiOption => {
                                divisi.append(`<option value="${divisiOption}">${divisiOption}</option>`)
                            })
                        } else if (office === 'cabang') {
                            divisiCabang.forEach(divisiOption => {
                                divisi.append(`<option value="${divisiOption}">${divisiOption}</option>`)
                            })
                        }

                        if (office === 'ho') {
                            baHo.forEach(area => {
                                branchArea.append(`<option value="${area}">${area}</option>`)
                            })
                        } else if (office === 'cabang') {
                            baCabang.forEach(area => {
                                branchArea.append(`<option value="${area}">${area}</option>`)
                            })
                        }
                    });

                    const paHo = ["HEAD OFFICE"]
                    const paBjm = [
                        "ADARO",
                        "BANJARMASIN",
                        "MUARA TEWEH",
                        "PANGKALAN BUN",
                        "PONTIANAK",
                        "SAMPIT",
                    ]
                    const paBlp = [
                        "BALIKPAPAN",
                        "BATUKAJANG",
                        "TANJUNG REDEP",
                        "TARAKAN",
                    ]
                    const paFrp = [
                        "FREEPORT",
                        "JAYAPURA",
                        "MERAUKE",
                        "TIMIKA",
                    ]
                    const paJkt = [
                        "BANDUNG",
                        "JAKARTA",
                        "SEMARANG",
                    ]
                    const paPkb = [
                        "BANDAR LAMPUNG",
                        "JAMBI",
                        "PALEMBANG",
                        "PEKANBARU",
                        "TANJUNG ENIM",
                    ]
                    const paSby = [
                        "NTB",
                        "SORONG",
                        "SURABAYA",

                    ]
                    const paSdp = [
                        "GORONTALO",
                        "MAKASSAR",
                        "PALU",
                        "SIDRAP",
                        "TAHUNA",
                    ]
                    const paSmd = [
                        "BONTANG",
                        "MUARA LAWA",
                        "SAMARINDA",
                        "SANGATTA",
                    ]
                    const paTbt = [
                        "MEDAN",
                        "TEBING TINGGI",
                    ]
                    $('#branch').change(function(e) {
                        const branch = e.target.value

                        const personalArea = $('#personal')

                        personalArea.empty()
                        personalArea.append('<option value="">Pilih Personal Area</option>')

                        if (branch === 'HO') {
                            paHo.forEach(personal => {
                                personalArea.append(`<option value="${personal}">${personal}</option>`)
                            })
                        } else if (branch === 'BJM') {
                            paBjm.forEach(personal => {
                                personalArea.append(`<option value="${personal}">${personal}</option>`)
                            })
                        } else if (branch === 'BLP') {
                            paBlp.forEach(personal => {
                                personalArea.append(`<option value="${personal}">${personal}</option>`)
                            })
                        } else if (branch === 'FRP') {
                            paFrp.forEach(personal => {
                                personalArea.append(`<option value="${personal}">${personal}</option>`)
                            })
                        } else if (branch === 'JKT') {
                            paJkt.forEach(personal => {
                                personalArea.append(`<option value="${personal}">${personal}</option>`)
                            })
                        } else if (branch === 'PKB') {
                            paPkb.forEach(personal => {
                                personalArea.append(`<option value="${personal}">${personal}</option>`)
                            })
                        } else if (branch === 'SBY') {
                            paSby.forEach(personal => {
                                personalArea.append(`<option value="${personal}">${personal}</option>`)
                            })
                        } else if (branch === 'SDP') {
                            paSdp.forEach(personal => {
                                personalArea.append(`<option value="${personal}">${personal}</option>`)
                            })
                        } else if (branch === 'SMD') {
                            paSmd.forEach(personal => {
                                personalArea.append(`<option value="${personal}">${personal}</option>`)
                            })
                        } else if (branch === 'TBT') {
                            paTbt.forEach(personal => {
                                personalArea.append(`<option value="${personal}">${personal}</option>`)
                            })
                        }
                    })
                });
            </script>
        </div>
    </div>
</div>