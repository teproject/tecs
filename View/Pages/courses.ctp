<div id="courses">
	<h2 id="page-title">Courses</h2>
	
	<div class="collapsible-item">
		<h3 class="collapsible" id="section1">Data Mining</h3>
		<div class="container">
			<div class="content">
				<p>This course will provide an overview of topics such as introduction to data mining and knowledge history; data mining with structured and unstructured data; foundations of pattern clustering; clustering paradigms; clustering for data mining; data mining using neural networks and genetic algorithms; fast discovery of association rules; applications of data mining to pattern classification; and feature selection. The goal of this course is to introduce students to current machine learning and related data mining methods. It is intended to provide enough background to allow students to apply machine learning and data mining techniques to learning problems in a variety of application areas.</p>
			</div>
		</div>
	</div>
	
	<div class="collapsible-item">
		<h3 class="collapsible" id="section2">Technology Entrepreneurship</h3>
		<div class="container">
			<div class="content">
				<p>This is an interdisciplinary course designed to provide students with an entrepreneurial mindset in the context of information and computational technologies and algorithms as well as to equip them with tools appropriate to identifying real business opportunities worthy of pursuit. Technology industries and applications will be emphasized along with computing opportunities. The main concepts covered are creativity and innovation; market analysis; customer-driven product identification and development; technology-based business creation, financing, and management; competitive business plans; and niche marketing. Two key components of this course will be a project to develop a business plan for a technology venture around a specific product or system, wherein entrepreneurs will serve as mentors to students and teams, and a business plan competition where other industry experts and entrepreneurs will serve as judges. The course will be supplemented with up to three guest lectures as well as the review and analysis of entrepreneur case studies.</p>
			</div>
		</div>
	</div>
	
	<div class="collapsible-item">
		<h3 class="collapsible" id="section3">Financial Computing and Entrepreneurship</h3>
		<div class="container">
			<div class="content">
				<p>This interdisciplinary course integrates computing (computer science, information systems, and information technology), finance, and applied entrepreneurship to provide the student analytical, quantitative, application, and entrepreneurial skills needed for sound and strategic financial decision making and information technology based product creation. The course will emphasize creative problem solving of and development innovative algorithms for financial problems relating to such topics as financial analysis and time value of money, derivative products, portfolio management, hedging strategies, arbitrage, risks, Black-Scholes model, interest rate models, and fixed income analysis. Within a collaborative team environment, the student will develop innovative algorithmic solutions for financial problems as well as analyze, evaluate model financial time series with neural networks; the algorithms will be implemented in a high-level computer language (e.g. Java, C/C++, or Matlab) into prototypes for potentially marketable financial software products. An entrepreneurial perspective will permeate the course in the form of creative thinking and calculated risk-taking in the design and development of the algorithms and prototypes, and the development of a high-quality business plan for an information technology company to market the likely software products. There will be a reliance on entrepreneurs for team mentors, project selection and scaling, and guest speakers.</p>
			</div>
		</div>
	</div>
	
	<div class="collapsible-item">
		<h3 class="collapsible" id="section4">Modeling of Financial Processes and Systems</h3>
		<div class="container">
			<div class="content">
				<p>This course introduces students to models of financial processes through service-oriented architecture (SOA) methods and cloud computing. The focus of the course is on a program management methodology for projects enabling efficiency and flexibility in processes through Web services and SOA. The course concludes with students presenting models of financial processes and systems that contribute a competitive edge to financial firms through innovative technologies of leading edge SOA technology firms that market to Wall Street and other financial districts.</p>
			</div>
		</div>
	</div>
	<div class="collapsible-item">
		<h3 class="collapsible" id="section5">Entrepreneurial Health Informatics</h3>
		<div class="container">
			<div class="content">
				<p>This is an entrepreneurial health informatics course that provides an overview of computer based clinical record systems as well as decision support systems for medical application. The course will mainly focus on experiential entrepreneurship through innovation, evolution, and imitation in as well as algorithmic solutions for health decision support; data acquisition, processing, and analysis; and delivery systems and services. The main topics covered include health information technology systems standard and terminologies, risks and uncertainty, data and workflow modeling, data mining, data visualization, and medical decision making. Teamwork and entrepreneurship will be infused throughout the course in the form of creative critical thinking and problem-solving and calculated risk-taking in the design and development of the algorithms supported by a quality business plan for a health related information technology company. Entrepreneurs will be recruited for the roles of team mentors, project selection and scaling, and guest speakers. </p>
			</div>
		</div>
	</div>
	<div class="collapsible-item">
		<h3 class="collapsible" id="section6">Projects</h3>
		<div class="container">
			<div class="content">
				<p> Following is a listing of all courses pretaining to the above courses: </p>
				<ul>
					<li><?php
						echo $this->Html->link(
							'CS 325/IS 348 (Data Mining) - Class Project - Spring 2011',
							'/files/cs325_cit348%20class%20spring2011%20project.doc'
						);
					?></li>
					<li><?php
						echo $this->Html->link(
							'CS 397N/CIT 397K (Technology Entrepreneurship) - Fall 2011',
							'/files/cs397N_cit397K%20class%20fall%202011%20project.doc'
						);
					?></li>
					<li><?php
						echo $this->Html->link(
							'CS 397D (Financial computing) - Spring 2012',
							'/files/cs397D%5BFinancial%20Computing%20n%20Entrepreneurship%5D.doc'
						);
					?></li>
					<li><?php
						echo $this->Html->link(
							'CIT 348 (Data Mining) - Minimizing Adverse Drugs Reaction in ER patient in an Interconnected World',
							'/files/Adverse%20Drug%20Reaction%20in%20ER%5Bclass%20project%5D.docx'
						);
					?></li>
					<li><?php
						echo $this->Html->link(
							'Technology Enterpreneurship (Sample Project)',
							'/files/TE-sample%20project.pptx'
						);
					?></li>
					<li><?php
						echo $this->Html->link(
							'The Fame Business Plan (Sample Business Plan)',
							'/files/TheFamePlan.docx'
						);
					?></li>
					<li><?php
						echo $this->Html->link(
							'Class Mentors',
							'/files/mentors%20record.docx'
						);
					?></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php 
	echo $this->Html->css('collapsible');
	echo $this->Html->script('collapsible/jquery.collapsible');
?>
<script type="text/javascript">
    $(document).ready(function() {
        //collapsible management
        $('.collapsible').collapsible({
            defaultOpen: 'section1'
        });
    });
</script>