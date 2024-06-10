<style>
body{
margin-top:20px;
background-color: #f7f7ff;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0px solid rgba(0, 0, 0, 0);
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}
.fm-file-box {
    font-size: 25px;
    background: #e9ecef;
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: .25rem;
}
.ms-2 {
    margin-left: .5rem!important;
}

.fm-menu .list-group a {
    font-size: 16px;
    color: #5f5f5f;
    display: flex;
    align-items: center;
}
.list-group-flush>.list-group-item {
    border-width: 0 0 1px;
}
.list-group-item+.list-group-item {
    border-top-width: 0;
}
.py-1 {
    padding-top: .25rem!important;
    padding-bottom: .25rem!important;
}
.list-group-item {
    position: relative;
    display: block;
    padding: .5rem 1rem;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid rgba(0, 0, 0, .125);
}

.radius-15 {
    border-radius: 15px;
}
.fm-icon-box {
    font-size: 32px;
    background: #ffffff;
    width: 52px;
    height: 52px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: .25rem;
}
.font-24 {
    font-size: 24px;
}
.ms-auto {
    margin-left: auto!important;
}
.font-30 {
    font-size: 30px;
}
.user-groups img {
    margin-left: -14px;
    border: 1px solid #e4e4e4;
    padding: 2px;
    cursor: pointer;
}

.rounded-circle {
    border-radius: 50%!important;
}
    </style>


<link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />

<div class="container">

				<div class="d-flex align-items-center">
					<div>
						<h5 class="mb-0">Arquivos recentes</h5>
					</div>
					<div class="ms-auto"><a href="{{ route('atividade.create', $projeto->id) }}" class="btn btn-sm btn-outline-secondary">Nova Atividade</a>
					</div>
				</div>
				<div class="table-responsive mt-3">
					<table class="table table-striped table-hover table-sm mb-0">
						<thead>
							<tr>
								<th>Nome <i class="bx bx-up-arrow-alt ms-2"></i>
								</th>
								<th>Proprietário</th>
								<th>Data</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div><i class="bx bxs-file-pdf me-2 font-24 text-danger"></i>
										</div>
										<div class="font-weight-bold text-danger">Projeto Pre Aprovado</div>
									</div>
								</td>
								<td>70237777</td>
								<td>Sep 3, 2019</td>
								<td><i class="fa fa-ellipsis-h font-24"></i>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div><i class="bx bxs-file me-2 font-24 text-primary"></i>
										</div>
										<div class="font-weight-bold text-primary">How to Create a Case Study</div>
									</div>
								</td>
								<td>3 members</td>
								<td>Jun 12, 2019</td>
								<td><i class="fa fa-ellipsis-h font-24"></i>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div><i class="bx bxs-file me-2 font-24 text-primary"></i>
										</div>
										<div class="font-weight-bold text-primary">Landing Page Structure</div>
									</div>
								</td>
								<td>10 members</td>
								<td>Jul 17, 2019</td>
								<td><i class="fa fa-ellipsis-h font-24"></i>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div><i class="bx bxs-file-pdf me-2 font-24 text-danger"></i>
										</div>
										<div class="font-weight-bold text-danger">Meeting Report</div>
									</div>
								</td>
								<td>5 members</td>
								<td>Aug 28, 2019</td>
								<td><i class="fa fa-ellipsis-h font-24"></i>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div><i class="bx bxs-file me-2 font-24 text-primary"></i>
										</div>
										<div class="font-weight-bold text-primary">Project Documents</div>
									</div>
								</td>
								<td>Only you</td>
								<td>Aug 17, 2019</td>
								<td><i class="fa fa-ellipsis-h font-24"></i>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div><i class="bx bxs-file-doc me-2 font-24 text-success"></i>
										</div>
										<div class="font-weight-bold text-success">Review Checklist Template</div>
									</div>
								</td>
								<td>7 members</td>
								<td>Sep 8, 2019</td>
								<td><i class="fa fa-ellipsis-h font-24"></i>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div><i class="bx bxs-file me-2 font-24 text-primary"></i>
										</div>
										<div class="font-weight-bold text-primary">How to Create a Case Study</div>
									</div>
								</td>
								<td>3 members</td>
								<td>Jun 12, 2019</td>
								<td><i class="fa fa-ellipsis-h font-24"></i>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div><i class="bx bxs-file me-2 font-24 text-primary"></i>
										</div>
										<div class="font-weight-bold text-primary">Landing Page Structure</div>
									</div>
								</td>
								<td>10 members</td>
								<td>Jul 17, 2019</td>
								<td><i class="fa fa-ellipsis-h font-24"></i>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div><i class="bx bxs-file-doc me-2 font-24 text-success"></i>
										</div>
										<div class="font-weight-bold text-success">Review Checklist Template</div>
									</div>
								</td>
								<td>7 members</td>
								<td>Sep 8, 2019</td>
								<td><i class="fa fa-ellipsis-h font-24"></i>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>