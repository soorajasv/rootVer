list.files(pattern=".csv$")
list.filenames<-list.files(pattern=".csv$")
list.filenames
list.data <- list()

for (i in 1:length(list.filenames))
{
  list.data[[i]]<-read.csv(list.filenames[i])
}

names(list.data)<-list.filenames

checkValue = nrow(list.data[[1]])

for (i in 1:length(list.filenames)){
  if (checkValue == nrow(list.data[[i]])){
    print(sapply(list.data[[i]], function(x) sum(is.na(x))))
    ##print(names(list.data[i]))
  }
  print(i)
}

str(list.data[[1]])

# No missing Data or missing type, all the Data have the same number of Row